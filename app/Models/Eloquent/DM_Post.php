<?php

namespace App\Models\Eloquent;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Branch;
use App\Models\File;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Section;
use App\Models\Staff;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\MemberType;
use App\Models\MemberSubcategory;
use App\Models\Season;
use App\Models\Experience;
use App\Models\Defficult;
use App\Models\Cultural;
use App\Models\Month;
use App\Models\Post;
use App\Models\PostCategory;

class DM_Post extends Model
{
    use HasFactory;
    /**
     * get all the multiple language names
     */
    public static function getLanguage()
    {
        return Language::where('status', '=', 1)->where('deleted_at', '=', null)->get();
    }

    //get all the post
    public static function getAllPosts()
    {
        return Blog::where('deleted_at', '=', null)->where('status', '=', 1)->where('type', '=', 'post')->get();
    }

    //get all the page
    public static function getAllPages()
    {
        return Blog::where('deleted_at', '=', null)->where('status', '=', 1)->where('type', '=', 'page')->get();
    }

    /** Category List */
    public static function getCategoryList()
    {
        $data = DB::table('blog_categories')
            //      ->join('categories_name', 'blog_categories.id', '=', 'categories_name.category_id')
            //      //->where('categories_name.lang_id', '=', $lang_id)
            //      ->select('categories.*', 'categories_name.lang_id', 'categories_name.name as category_name')
            ->orderBy('order')
            ->get();
        return $data;
    }
    public static function getMultipleCategoryList($childCategoryIds)
    {
        $data = DB::table('blog_categories')
            ->whereIn('id', $childCategoryIds)
            ->orderBy('order')
            ->get();
        return $data;
    }

    public static function getCategory($category_id)
    {
        $data = DB::table('blog_categories')->orderBy('order')
            ->where('blog_categories.id', '=', $category_id)
            ->orderBy('order')
            ->first();
        return $data;
    }

    /** featured list page */
    public static function featuredPageList()
    {
        return Blog::where('deleted_at', '=', NULL)->where('status', '=', 1)->where('type', '=', 'page')->where('order', '!=', NULL)->orderBy('order')->get();
    }

    public static function getUpcommingTrail($limit)
    {
        return Blog::where('deleted_at', '!=', null)->where('status', '=', 1)->orderBy('id', 'desc')->where('type', 'post')->take($limit)->get();
    }

    public static function getTrails()
    {
        return Blog::where('status', 1)->where('type', 'post')->get()->groupBy('category_id');
    }



    public static function getLatestTrail($limit)
    {
        return Blog::where('deleted_at', '=', NULL)->where('status', '=', 1)->where('type', '=', 'post')->orderBy('id', 'desc')->take($limit)->get();
        // return Blog::where('deleted_at', '=', null)
        //     ->where('status', '=', 1)
        //     ->whereRaw('LOWER(type) = ?', ['post'])
        //     ->orderBy('id', 'desc')
        //     ->take($limit)
        //     ->get();
    }

    //get category base post
    public static function categoryBasedPost($category_id)
    {
        return Blog::where('deleted_at', '=', null)->where('category_id', '=', $category_id)->where('status', '=', 1)->get();
    }

    //get category base post
    public static function categoryPost($category_id, $number)
    {
        return Blog::latest('id')->where('deleted_at', '=', null)->where('category_id', '=', $category_id)->orderBy('id', 'desc')->where('status', '=', 1)->take($number)->get();
    }

    //get categories
    public static function getCategories()
    {
        return BlogCategory::get();
    }

    //get all the menu with public status
    public static function getMenu()
    {
        return Menu::where('status', '=', 1)->get();
    }
    public static function getSeasion()
    {
        return Season::where('status', 1)->get();
    }
    public static function getExperience()
    {
        return Experience::where('status', 1)->get();
    }
    public static function getDifficulty()
    {
        return Defficult::where('status', 1)->get();
    }
    public static function getCulture()
    {
        return Cultural::where('status', 1)->get();
    }
    public static function getMonths()
    {
        return Month::where('status', 1)->get();
    }

    // get the single post of particular language
    public static function getSinglePost($post_unique_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Blog::where('post_unique_id', '=', $post_unique_id)->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSingleOtherPost($post_unique_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Post::where('post_unique_id', '=', $post_unique_id)->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }


    // get the single post of particular language
    public static function getSinglePage($post_unique_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Blog::where('deleted_at', '=', null)
            ->where('post_unique_id', '=', $post_unique_id)
            ->where('type', '=', 'page')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    // get the single post of staff
    public static function getStaffDetail($id)
    {
        $post = Staff::where('id', '=', $id)
            ->first();
        return $post;
    }

    // get the file
    public static function getFile($post_unique_id)
    {
        return File::where('post_unique_id', '=', $post_unique_id)->get();
    }

    // get the single post of particular language
    public static function getSingleBlog($post_unique_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Blog::where('deleted_at', '=', null)
            ->where('post_unique_id', '=', $post_unique_id)
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSectionPost()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'about-us')
            ->orderBy('order', 'desc')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }


    public static function getSectionPostIndex()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'about-us')
            ->orderBy('order', 'asc')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSectionPostIndexCurriculum()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'curriculam')
            ->orderBy('order', 'asc')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSectionPostIndexFacilities()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'facilities')
            ->orderBy('order', 'asc')
            ->take(2)
            ->get();
        return $post;
    }

    public static function getSectionPostIndexFacilitiesSecond()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'facilities')
            ->orderBy('order', 'desc')
            ->take(2)
            ->get();
        return $post;
    }

    public static function getDestinationPosts($slug)
    {
        return Destination::where('slug', $slug)->firstOrfail();
    }

    public static function searchByDestiantion($query, $destination_id)
    {
        return Blog::where('title', 'LIKE', "%{$query}%")
            ->where('destination_id', $destination_id)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->where('deleted_at', NULL)
            ->get();
    }

    public static function getMemberType()
    {
        return MemberType::where('status', 1)->get();
    }

    public static function getMemberSubcategories()
    {
        return MemberSubcategory::where('status', 1)->get();
    }

    public static function getOtherPostCategoryList()
    {
        return PostCategory::where('status', 1)->get();
    }

    //get all the post List
    public static function getOtherPostList()
    {
        return Post::where('status', '=', 1)->get();
    }
    // get Office branch list
    public static function getOfficeBranch()
    {
        return Branch::where('status', '=', 1)
            ->orderBy('order', 'asc')
            ->get();
    }

    /**
     * download file
     */
    public static function downloadFile($id)
    {
        $file = File::where('id', '=', $id)->first();
        if (isset($file)) {
            $file->increment('download_count');
        }
        $file_path = getcwd() . '/' . $file->file;
        return response()->download($file_path);
    }

    /**
     * get the post by related category
     */
    public static function getRelatedPost($category_id, $post_unique_id)
    {
        return Post::where('category_id', '=', $category_id)
            ->where('post_unique_id', '!=', $post_unique_id)
            ->where('status', '=', 1)
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
    }
}
