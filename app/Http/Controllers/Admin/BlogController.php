<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\File;
use App\Models\Location;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BlogImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends DM_BaseController
{
    protected $panel = 'POST';
    protected $base_route = 'admin.blog';
    protected $view_path = 'admin.blog';
    protected $model;
    protected $table;
    protected $season;

    public function __construct(Blog $model, File $file)
    {
        $this->model = $model;
        $this->file_model = $file;
    }
    /** ===================================PAGE================================================== */
    public function indexPage(Request $request)
    {
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        $data['rows'] = $this->model::where('type', '=', 'page')->where('deleted_at', '=', null)->orderBy('order', 'ASC')->get();
        if ($request->ajax()) {
            $data = $this->model::where('type', '=', 'page')->where('deleted_at', '=', null)->orderBy('order', 'ASC')->get();
            //total post count
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category_id', function ($row) {
                    if ($row->category_id != null) {
                        return $row->postCategory->title;
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('image', function ($row) {
                    if ($row->blog_thumnail != null) {
                        return '<img src="' . asset($row->blog_thumnail) . '" alt="image" class="img-responsive" style="width: 80px; height: 40px;">';
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                ->editColumn('featured', function ($row) {
                    if ($row->featured == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Yes</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">No</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a href="' . route($this->base_route . '.edit', $row->post_unique_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.delete', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'featured', 'image', 'category_id'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function createPage()
    {
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function storePage(Request $request)
    {
        $rules = $this->model->getRulesPage();
        // $request->validate($rules);
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        if ($this->model->storeData($request)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function editPage(Request $request, $post_unique_id)
    {
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['rows'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function updatePage(Request $request, $post_unique_id)
    {

        $rules = $this->model->getRulesPage();
        $request->validate($rules);
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        if ($this->model->updateData($request, $post_unique_id)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function indexPost(Request $request)
    {
        $this->panel = 'Posts';
        $this->base_route = 'admin.blog';
        $this->view_path = 'admin.blog';
        $data['total'] = $this->model::where('deleted_at', '=', null)->where('type', 'post')->count();
        if ($request->ajax()) {
            $data = $this->model::where('deleted_at', '=', null)->where('type', 'post')->get();
            //total post count
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category_id', function ($row) {
                    if ($row->category_id != null) {
                        return $row->postCategory->title;
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('image', function ($row) {
                    if ($row->blog_thumnail != null) {
                        return '<img src="' . asset($row->blog_thumnail) . '" alt="image" class="img-responsive" style="width: 80px; height: 40px;">';
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a href="' . route($this->base_route . '.edit', $row->post_unique_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.delete', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'image', 'category_id'])
                ->make(true);
        }

        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function indexMemberPost(Request $request)
    {
        $this->panel = 'Posts';
        $this->base_route = 'member.blog';
        $this->view_path = 'user.blog';
        $data['total'] = $this->model::where('deleted_at', '=', null)->where('type', 'post')->where('user_id', auth()->user()->id)->count();
        if ($request->ajax()) {
            $data = $this->model->getUSerData();
            //total post count
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category_id', function ($row) {
                    if ($row->category_id != null) {
                        return $row->postCategory->title;
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('image', function ($row) {
                    if ($row->blog_thumnail != null) {
                        return '<img src="' . asset($row->blog_thumnail) . '" alt="image" class="img-responsive" style="width: 80px; height: 40px;">';
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a href="' . route($this->base_route . '.edit', $row->post_unique_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.delete', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'image', 'category_id'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $this->panel                 = 'Posts';
        $this->base_route            = 'admin.blog';
        $this->view_path             = 'admin.blog';
        $data['layout']              = 'layouts.admin';
        $data['user_id']             = Auth::user()->id;
        $data['season']              = $this->model->getSeason();
        $data['category']            = $this->model->getCategory();
        $data['difficulty']          = $this->model->getDifficulty();
        $data['transport']           = $this->model->getTransport();
        $data['month']               = $this->model->getMonth();
        $data['experience']          = $this->model->getExperience();
        $data['culture']             = $this->model->getCulture();
        $data['destination']         = $this->model->getDestination();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function createMemberPost()
    {
        $this->panel                    = 'Posts';
        $this->base_route               = 'member.blog';
        $this->view_path                = 'user.blog';
        $data['layout']                 = 'layouts.membership';
        $data['user_type']              = 'member';
        $data['category']               = $this->model->getCategory();
        $data['season']                 = $this->model->getSeason();
        $data['difficulty']             = $this->model->getDifficulty();
        $data['transport']              = $this->model->getTransport();
        $data['month']                  = $this->model->getMonth();
        $data['experience']             = $this->model->getExperience();
        $data['culture']                = $this->model->getCulture();
        $data['destination']            = $this->model->getDestination();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $this->panel = 'Posts';
        $rules = $this->model->getRules();
        // $request->validate($rules);
        if ($this->model->storeData($request)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function editPost(Request $request, $post_unique_id)
    {
        $this->panel = 'Posts';
        $this->base_route = 'admin.blog';
        $this->view_path = 'admin.blog';
        $data['layout'] = 'layouts.admin';
        $data['user_type'] = 'admin';
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['category'] = $this->model->getCategory();
        $data['season'] = $this->model->getSeason();
        $data['difficulty'] = $this->model->getDifficulty();
        $data['transport'] = $this->model->getTransport();
        $data['month'] = $this->model->getMonth();
        $data['month'] = $this->model->getMonth();
        $data['experience'] = $this->model->getExperience();
        $data['culture'] = $this->model->getCulture();
        $data['destination'] = $this->model->getDestination();
        // $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['rows'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function editMemberPost(Request $request, $post_unique_id)
    {
        $this->panel = 'Posts';
        $this->base_route               = 'member.blog';
        $this->view_path                = 'user.blog';
        $data['layout'] = 'layouts.membership';
        $data['user_type'] = 'member';
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['category'] = $this->model->getCategory();
        $data['season'] = $this->model->getSeason();
        $data['difficulty'] = $this->model->getDifficulty();
        $data['transport'] = $this->model->getTransport();
        $data['month'] = $this->model->getMonth();
        $data['experience'] = $this->model->getExperience();
        $data['culture'] = $this->model->getCulture();
        // $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['destination'] = $this->model->getDestination();
        $data['rows'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $post_unique_id)
    {
        $rules = $this->model->getUpdateRules();
        // $request->validate($rules);
        $this->panel = 'Posts';
        if ($request->user_type == 'member') {
            $this->base_route = 'member.blog';
            $this->view_path = 'user.blog';
        } else {
            $this->base_route = 'admin.blog';
            $this->view_path = 'admin.blog';
        }

        if ($this->model->updateData($request, $post_unique_id)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        if (Auth::user()->role == 'admin') {
            return redirect()->route($this->base_route . '.index');
        } else {
            return redirect()->route($this->base_route . '.index');
        }
    }

    public function status(Request $request)
    {
        $row                                    = $this->fiscalYear;
        $user                                   = $row->findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status added SuccessFully']);
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
    }



    public function deletedPost()
    {
        $this->panel = 'Posts';
        $data['layout'] = 'layouts.admin';
        $data['user_type'] = 'admin';
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }
    public function deletedMemberPost()
    {
        $this->panel = 'Posts';
        $data['layout'] = 'layouts.membership';
        $this->base_route = 'member.blog';
        $this->view_path = 'admin.blog';
        $data['layout'] = 'layouts.membership';
        $data['user_type'] = 'member';
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->where('user_id', auth()->user()->id)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }


    public function restore($id)
    {
        $data = $this->model::where('id', '=', $id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    // public function permanentDelete($id)
    // {
    //     $row = $this->model::findOrFail($id);
    //     if ($row->thumbs != null) {
    //         $thumbPath = getcwd() . $row->thumbs;
    //         if (file_exists($thumbPath)) {
    //             if (!unlink($thumbPath)) {
    //                 Log::error("Failed to delete thumbnail at: " . $thumbPath);
    //             }
    //         } else {
    //             Log::warning("Thumbnail not found at: " . $thumbPath);
    //         }
    //     }
    //     $images = $row->blogImages;
    //     if (!$images->isEmpty()) {
    //         foreach ($images as $img) {
    //             $imagePath = getcwd() . $img['image_path'];

    //             if (file_exists($imagePath)) {
    //                 if (!unlink($imagePath)) {
    //                     Log::error("Failed to delete image at: " . $imagePath);
    //                 }
    //             } else {
    //                 Log::warning("Image not found at: " . $imagePath);
    //             }
    //         }
    //     }

    //     $videos = $row->videos;

    //     if (is_string($videos)) {
    //         $decodedVideos = json_decode($videos, true);

    //         if (json_last_error() === JSON_ERROR_NONE) {
    //             $videos = $decodedVideos;
    //         } else {
    //             $videos = [$videos];
    //         }
    //     }

    //     if (!is_array($videos)) {
    //         $videos = [$videos];
    //     }

    //     foreach ($videos as $v) {
    //         if (is_array($v) && !empty($v['thumbnail'])) {
    //             $thumbnailPath = getcwd() . $v['thumbnail'];
    //             if (file_exists($thumbnailPath)) {
    //                 if (!unlink($thumbnailPath)) {
    //                     Log::error("Failed to delete video thumbnail at: " . $thumbnailPath);
    //                 }
    //             } else {
    //                 Log::warning("Video thumbnail not found at: " . $thumbnailPath);
    //             }
    //         }
    //     }

    //     // Attempt to force delete the row
    //     try {
    //         $row->forceDelete();
    //         Log::info("Successfully force deleted blog with ID: " . $id);
    //     } catch (\Exception $e) {
    //         Log::error("Failed to force delete blog with ID: " . $id . ". Error: " . $e->getMessage());
    //         return response(false, 500);
    //     }

    //     return response(true);
    // }

    public function permanentDelete($id)
    {
        $row = $this->model::findOrFail($id);

        $file_path = getcwd() . $row->blog_thumnail;
        $file_path_icon = getcwd() . $row->route_map;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        if (is_file($file_path_icon)) {
            unlink($file_path_icon);
        }
        // Attempt to force delete the row
        try {
            $row->forceDelete();
            Log::info("Successfully force deleted blog with ID: " . $id);
        } catch (\Exception $e) {
            Log::error("Failed to force delete blog with ID: " . $id . ". Error: " . $e->getMessage());
            return response(false, 500);
        }

        return response(true);
    }

    public function destroyFile($id)
    {
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }

    public function updateOrder(Request $request)
    {
        // dd($request->order);
        $posts = $this->model::where('type', '=', 'page')->where('deleted_at', '=', NULL)->get();
        //  dd($posts);
        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }

    function show($post_unique_id)
    {
        $data['layout'] = 'layouts.admin';
        $blog = $this->model->where('post_unique_id', $post_unique_id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.show'), compact('blog', 'data'));
    }

    // function to delete blog image
    function deleteBlogImg($id)
    {
        $blog = BlogImage::findOrFail($id);
        $file_path = getcwd() . $blog->image_path;
        if ($blog) {
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $blog->delete();
            return response()->json(['success' => true, 'message' => 'Blog Image deleted successfully.']);
        }
    }
}
