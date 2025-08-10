<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends DM_BaseController
{
    protected $panel = 'Category';
    protected $base_route = 'admin.blogcategory';
    protected $view_path = 'admin.blogcategory';
    protected $model;
    protected $table;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'blogcategory';
    protected $prefix_path_image = '/upload_file/blogcategory/';


    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    public function index()
    {
        $items = $this->model->categoryTree();
        $category = $this->model->getHtml($items);
        return view(parent::loadView($this->view_path . '.index'), compact('category'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:225|min:2',
            'status' => 'required|boolean'
        ]);

        $model                        = $this->model;
        $model->title                 = $request->title;
        $model->slug                  = \Str::slug($request->title);
        $model->unique_id             = env("APPLICATION_SERIAL", 2079) . "" . date("dHis") . rand(0000, 9999);
        $model->description           = $request->description;
        $model->status                = $request->status;
        if ($request->hasFile('image')) {
            $model->thumbs            = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $success                      = $model->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['category'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:225|min:2',
            'status' => 'required|boolean'
        ]);

        $model                               = $this->model::where('id', '=', $id)->first();
        $model->title                        = $request->title;
        $model->slug                         = \Str::slug($request->title);
        $model->description                  = $request->description;
        $model->status                       = $request->status;
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $model->thumbs;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $model->thumbs = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $success                             = $model->update();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
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


    /** Store the order from ajax */
    public function storeOrder(Request $request)
    {
        if ($request->ajax()) {
            $data = json_decode($_POST['data']);
            $readbleArray = parent::parseJsonArray($data);
            $i = 0;
            foreach ($readbleArray as $row) {
                $i++;
                $category = BlogCategory::findOrFail($row['id']);
                $category->order = $i;
                $category->parent_id = $row['parentID'];
                $category->save();
            }
            // return var_dump(Response::json($category));
        }
    }
}