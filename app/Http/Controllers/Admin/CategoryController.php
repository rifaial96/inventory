<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Category;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {

        $category = new Category();
        $category->category = $request->category;
        $category->discount = $request->discount;
        $category->save();
        if ($category->id) {
            return redirect('admin/category')->with('success', trans('category/message.success.create'));
        } else {
            return Redirect::route('admin/category')->withInput()->with('error', trans('category/message.error.create'));
        }

    }

    //Show
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    //Edit
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    //Update
    public function update(CategoryRequest $request, $id)
    {        
        $category = Category::find($id);
        $category->category = $request->input('category');
        $category->discount = $request->input('discount');
        if ($category->update()) {
            return redirect('admin/category')->with('success', trans('category/message.success.update'));
        } else {
            return Redirect::route('admin/category')->withInput()->with('error', trans('category/message.error.update'));
        }
    }


    public function getModalDelete(Category $category)
    {
        $model = 'category';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.category.delete', ['id' => $category->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('category/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect('admin/category')->with('success', trans('category/message.success.delete'));
        } else {
            return Redirect::route('admin/category')->withInput()->with('error', trans('category/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $category = Category::get(['id', 'category','discount', 'created_at']);

        return DataTables::of($category)
            ->editColumn('created_at', function (Category $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.category.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Category"></i></a>';
                $actions .= '<a href=' . route('admin.category.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Category"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
