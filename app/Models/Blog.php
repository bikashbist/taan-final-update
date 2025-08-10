<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class Blog extends DM_BaseModel
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at', 'created_at'];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'blogs';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'blog';
    protected $file   = 'map';
    protected $prefix_path_image = '/upload_file/blog/';
    protected $prefix_path_file = '/upload_file/blog/map/';


    protected $casts = [
        'faqs' => 'array',
        'images' => 'array',
        'videos' => 'array',
        'days' => 'array',
    ];



    public function __construct()
    {
        $this->folder_path_image  = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file   = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
    }
    public function postTransport()
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }

    public function postDestination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function postDifficulty()
    {
        return $this->belongsTo(Defficult::class, 'difficult_id');
    }

    public function postCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    public function postTypes()
    {
        return $this->belongsTo(Types::class, 'types_id');
    }

    public function LocationTypes()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    //POST
    public function getRules()
    {
        $rules = array(
            'category_id'            => 'required|integer',
            'title'                  => 'required|max:225|string',
            'blog_thumnail'          => 'required|image',
            'status'                 => 'required|boolean',
            'description'            => 'required',
            'route_map'              => 'required|image',
        );
        return $rules;
    }
    // post update
    public function getUpdateRules()
    {
        $rules = array(
            'category_id'            => 'required',
            'title'                  => 'required|max:225|string',
            'blog_thumnail'          => 'sometimes|image',
            'status'                 => 'required|boolean',
            'description'            => 'required',
            'route_map'              => 'sometimes|image',
        );
        return $rules;
    }
    //Page
    public function getRulesPage()
    {
        $rules = array(
            'title'                  => 'required|max:225',
            'description'            => 'required',
            'status'                 => 'required|boolean'
        );
        return $rules;
    }
    public function getData()
    {
        $data = Blog::where('deleted_at', '=', null)
            ->where('type', 'post')
            ->orderBy('id', 'DESC')->get();
        return $data;
    }
    public function getUSerData()
    {
        return Blog::where('user_id', auth()->user()->id)
            ->where('type', '=', 'post')
            ->where('deleted_at', '=', null)
            ->select('title', 'blog_thumnail', 'status', 'category_id', 'created_at', 'visit_no', 'status', 'post_unique_id', 'id')
            ->orderBy('id', 'DESC')
            ->get();
    }
    public function getCategory()
    {
        $data = DB::table('blog_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getSeason()
    {
        $data = DB::table('seasons')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getDifficulty()
    {
        $data = DB::table('defficults')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getMonth()
    {
        $data = DB::table('months')->where('status', 1)
            ->orderBy('id', 'ASC')
            ->get();
        return $data;
    }
    public function getExperience()
    {
        return DB::table('experiences')->where('status', 1)->orderBy('id', 'DESC')->get();
    }
    public function getCulture()
    {
        return DB::table('culturals')->where('status', 1)->orderBy('id', 'DESC')->get();
    }
    public function getDestination()
    {
        return DB::table('destinations')->where('status', 1)->orderBy('id', 'DESC')->get();
    }
    public function getTransport()
    {
        return DB::table('transports')->where('status', 1)->orderBy('id', 'DESC')->get();
    }
    function getYoutubeIdFromUrl($video_url)
    {
        preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $video_url, $matches);
        if ($matches) {
            return $matches[2];
        }
    }
    public function storeData(Request $request)
    {
        try {
            $blog_thumnail                   = null;
            $route_map                       = null;
            $videoes                         = [];
            if ($request->video_link) {
                foreach ($request->video_link as $key => $link) {
                    $videoData = [
                        'id' => $this->getYoutubeIdFromUrl($link),
                        'link' => $link,
                        'thumbnail' => null, // Default to null
                    ];
                    // Check if the video_thumbnail file is provided for this link
                    if ($request->hasFile("video_thumbnail.$key")) {
                        $videoData['thumbnail'] = $this->uploadFile($request->file("video_thumbnail.$key"));
                    }
                    $videoes[] = $videoData;
                }
            }
            // DB::beginTransaction();
            if ($request->hasFile('blog_thumnail')) {
                $blog_thumnail                                  = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'blog_thumnail');
            }
            if ($request->hasFile('route_map')) {
                $route_map                                      = parent::uploadImage($request, $this->folder_path_file, $this->prefix_path_file, 'route_map');
            }
            $blog                                               = new Blog();
            $blog->post_unique_id                               = uniqid(Auth::user()->id . '_');
            $blog->type                                         = $request->type;
            $blog->title                                        = $request->title;
            $blog->slug                                         = Str::slug($request->title);
            $blog->trail_address                                = $request->trail_address;
            $blog->duration                                     = $request->duration;
            $blog->activities                                   = $request->activities;
            $blog->max_altitude                                 = $request->max_altitude;
            $blog->group_size                                   = $request->group_size;
            $blog->category_id                                  = $request->category_id;
            $blog->child_category_id                            = json_encode($request->child_category_id);            
            $blog->user_id                                      = Auth::user()->id;
            $blog->season_id                                    = $request->season_id;
            $blog->difficult_id                                 = $request->difficult_id;
            $blog->month_id                                     = $request->month_id;
            $blog->experience_id                                = $request->experience_id;
            $blog->culture_id                                   = $request->culture_id;
            $blog->destination_id                               = $request->destination_id;
            $blog->transport_id                                 = $request->transport_id;
            $blog->status                                       = $request->status;
            $blog->featured                                     = $request->featured;
            $blog->description                                  = $request->description;
            $blog->photo_video_description                      = $request->photo_video_description;
            $blog->more_info                                    = $request->more_info;
            $blog->days                                         = json_encode($request->days);
            $blog->faq                                          = json_encode($request->faq);
            $blog->videos                                       = json_encode($videoes);
            $blog->meta_tag                                     = $request->meta_tag;
            $blog->meta_description                             = $request->meta_description;
            $blog->blog_thumnail                                = $blog_thumnail;
            $blog->route_map                                    = $route_map;
            $blog->url                                           = $request->url;
            $blog->save();


            // $slug                            = 
            // $post_thumbnail                  = null;
            // $route_map                       = null;


            // $blog->category_id                                  = $request->category_id;
            // $blog->user_id                                      = Auth::user()->id;
            // $blog->post_unique_id                               = $post_unique_id;
            // $blog->thumbs                                       = $post_thumbnail;
            // $blog->route_map                                    = $route_map;
            // $blog->featured                                     = $request->featured;
            // $blog->tag                                       = $tag;
            // $blog->author                                    = $author;
            // $blog->url                                       = $url;
            // $blog->days                                      = json_encode($days);
            // $blog->description                               = $description;
            // $blog->faqs                                      = json_encode($faq);
            // $blog->videos                                    = json_encode($videoes);
            // $blog->more_details                              = $more_details;
            // $blog->meta_title                                = $meta_title;
            // $blog->meta_tag                                  = json_encode(explode(',', $meta_tag));
            // $blog->meta_description                          = $meta_description;
            // $blog->status                                    = $status;
            // $blog->destination                               = $destination;
            // $blog->durations                                 = $durations;
            // $blog->trip_difficulty                           = $trip_difficulty;
            // $blog->activities                                = $activities;
            // $blog->max_altitude                              = $max_altitude;
            // $blog->group_size                                = $group_size;
            // $blog->season_id                                 = $season_id;
            // $blog->difficult_id                              = $difficult_id;
            // $blog->transport_id                              = $transport_id;
            // $blog->month_id                                  = $month_id;
            // $blog->culture_id                                = $culture_id;
            // $blog->destination_id                            = $destination_id;
            // $blog->experience_id                             = $experience_id;
            // $blog->trail_address                             = $trail_address;
            // $blog->video_id                                  = $this->getYoutubeIdFromUrl($url);
            // $blog->save();

            //Upload images if provided
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $blogImage                  = new BlogImage();
                    $imagePath                  = $this->uploadBlogImage($image);
                    $blogImage->image_path      = $imagePath;
                    $blogImage->user_id         = Auth::user()->id;
                    $blogImage->blog_id         = $blog->id;
                    $blogImage->post_unique_id  = $blog->post_unique_id;
                    $blogImage->save();
                }
            }
            // DB::commit();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            // DB::rollback();
            return false;
        }
    }

    protected function uploadFile($file)
    {
        $folderPath = '/upload_file/blog/youtube_thumb/';
        $prefixPath = 'thumbnail_';
        $fileName = $prefixPath . time() . '.' . $file->getClientOriginalExtension();
        $file->move(getcwd() . '/' . $folderPath, $fileName);
        return $folderPath . $fileName;
    }

    protected function uploadBlogImage($file)
    {
        $folderPath = '/upload_file/blog/gallery/';
        // $prefixPath = 'blag_';
        $fileName = time() . '_' . rand() . '_' . $file->getClientOriginalName();
        $file->move(getcwd() . '/' . $folderPath, $fileName);
        return $folderPath . $fileName;
    }

    public function updateData(Request $request, $post_unique_id)
    {
        try {
            // DB::beginTransaction();

            $videoes                         = [];
            $faq                             = [];

            // Handle video links and thumbnails
            if ($request->video_link) {
                foreach ($request->video_link as $key => $link) {
                    $videoData = [
                        'id' => $this->getYoutubeIdFromUrl($link),
                        'link' => $link,
                        'thumbnail' => $request->image_path[$key] ?? null, // Use existing thumbnail if not updated
                    ];
                    // Check if a new video thumbnail is uploaded
                    if ($request->hasFile("video_thumbnail.$key")) {
                        // If there's an existing thumbnail, delete it
                        if (!empty($videoData['thumbnail']) && file_exists($videoData['thumbnail'])) {
                            unlink($videoData['thumbnail']);
                        }
                        $videoData['thumbnail'] = $this->uploadFile($request->file("video_thumbnail.$key"));
                    }
                    $videoes[] = $videoData;
                }
            } else {
                $videoes = [
                    [
                        'id' => null,
                        'link' => null,
                        'thumbnail' => null,
                    ],
                ];
            }
            //Object of the blog
            $blog                                                 = Blog::where('post_unique_id', '=', $post_unique_id)->first();

            $existingVideos               = json_decode($blog->videos, true) ?? [];
            $newVideoIds                  = array_column($videoes, 'id');
            foreach ($existingVideos as $existingVideo) {
                if (!in_array($existingVideo['id'], $newVideoIds)) {
                    // If video is removed, delete the thumbnail
                    if (!empty($existingVideo['thumbnail']) && file_exists($existingVideo['thumbnail'])) {
                        unlink($existingVideo['thumbnail']);
                    }
                }
            }
            // Handle FAQs
            $faq                                                 = isset($request->faq) ? $request->faq : [['question' => null, 'ans' => null],];
            $days                                                = isset($request->days) ? $request->days : [['day' => null, 'days_title' => null, 'days_descriptions' => null],];
            if ($request->hasFile('blog_thumnail')) {
                // dd('here');
                $file_path = getcwd() . $blog->blog_thumnail;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $blog->blog_thumnail                             = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'blog_thumnail');
            }
            if ($request->hasFile('route_map')) {
                $file_path = getcwd() . $blog->route_map;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $blog->route_map                                 = parent::uploadImage($request, $this->folder_path_file, $this->prefix_path_file, 'route_map');
            }

            $blog->title                                         = $request->title;
            $blog->slug                                          = Str::slug($request->title);
            $blog->trail_address                                 = $request->trail_address;
            $blog->duration                                      = $request->duration;
            $blog->activities                                    = $request->activities;
            $blog->max_altitude                                  = $request->max_altitude;
            $blog->group_size                                    = $request->group_size;
            $blog->category_id                                   = $request->category_id;
            $blog->child_category_id                             = json_encode($request->child_category_id);
            $blog->user_id                                       = Auth::user()->id;
            $blog->season_id                                     = $request->season_id;
            $blog->difficult_id                                  = $request->difficult_id;
            $blog->month_id                                      = $request->month_id;
            $blog->experience_id                                 = $request->experience_id;
            $blog->culture_id                                    = $request->culture_id;
            $blog->destination_id                                = $request->destination_id;
            $blog->transport_id                                  = $request->transport_id;
            $blog->status                                        = $request->status;
            $blog->featured                                      = $request->featured;
            $blog->description                                   = $request->description;
            $blog->photo_video_description                       = $request->photo_video_description;
            $blog->more_info                                     = $request->more_info;
            $blog->days                                          = json_encode($days);
            $blog->faq                                           = json_encode($faq);
            $blog->videos                                        = json_encode($videoes);
            $blog->meta_tag                                      = $request->meta_tag;
            $blog->meta_description                              = $request->meta_description;
            $blog->url                                           = $request->url;
            $blog->save();

            // Upload images if provided
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $blogImage                                   = new BlogImage();
                    $imagePath                                   = $this->uploadBlogImage($image);
                    $blogImage->image_path                       = $imagePath;
                    $blogImage->user_id                          = Auth::user()->id;
                    $blogImage->blog_id                          = $blog->id;
                    $blogImage->post_unique_id                   = $blog->post_unique_id;
                    $blogImage->save();
                }
            }

            // Handle post files
            // if (isset($post_files)) {
            //     foreach ($post_files as $file) {
            //         File::create([
            //             'post_unique_id' => $post_unique_id,
            //             'title' => $request->title,
            //             'file' => $file,
            //         ]);
            //     }
            // }

            // DB::commit();
            return true;
        } catch (\Throwable $th) {
            // DB::rollback();
            dd($th);
            return false;
        }
    }


    public function galleryImageUpload($request)
    {
        // Upload images if provided
        try {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $blogImage                   = new BlogImage();
                    $imagePath                   = $this->uploadBlogImage($image);
                    $blogImage->image_path       = $imagePath;
                    $blogImage->user_id          = Auth::user()->id;
                    $blogImage->post_unique_id   = $blogImage->post_unique_id;
                    $blogImage->save();
                }
            }
            return true;
        } catch (\Exception $e) {
            dd($e);
            return false;
        }
    }

    public function blogImages()
    {
        return $this->hasMany(BlogImage::class, 'blog_id');
    }
    public function blogTransport()
    {
        return Transport::where('id', $this->transport_id)->first();
    }
}
