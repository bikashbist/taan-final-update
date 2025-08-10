<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends DM_BaseController
{
    protected $panel = 'Branch';
    protected $base_route = 'admin.branch';
    protected $view_path = 'admin.branch';
    protected $model;
    protected $table;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'branch';
    protected $prefix_path_image = '/upload_file/branch/';


    public function __construct(Branch $model)
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
        $model->status                = $request->status;
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
        $model->status                       = $request->status;
        $success                             = $model->update();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
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
                $category = Branch::findOrFail($row['id']);
                $category->order = $i;
                $category->parent_id = $row['parentID'];
                $category->save();
            }
            // return var_dump(Response::json($category));
        }
    }
}
