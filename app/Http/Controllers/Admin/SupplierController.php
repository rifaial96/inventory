<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Supplier;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    public function index()
    {

        $supplier = Supplier::all();
        return view('admin.supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(SupplierRequest $request)
    {

        $supplier = new Supplier();
        $supplier->company = $request->company;
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->state = $request->state;
        $supplier->save();
        if ($supplier->id) {
            return redirect('admin/supplier')->with('success', trans('supplier/message.success.create'));
        } else {
            return Redirect::route('admin/supplier')->withInput()->with('error', trans('supplier/message.error.create'));
        }

    }

    //Show
    public function show(Supplier $supplier)
    {
        return view('admin.supplier.show', compact('supplier'));
    }

    //Edit
    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    //Update
    public function update(SupplierRequest $request, $id)
    {        
        $supplier = Supplier::find($id);        
        $supplier->company = $request->input('company');
        $supplier->name = $request->input('name');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->state = $request->input('state');

        if ($supplier->update()) {
            return redirect('admin/supplier')->with('success', trans('supplier/message.success.update'));
        } else {
            return Redirect::route('admin/supplier')->withInput()->with('error', trans('supplier/message.error.update'));
        }
    }


    public function getModalDelete(Supplier $supplier)
    {
        $model = 'supplier';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.supplier.delete', ['id' => $supplier->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('supplier/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy(Supplier $supplier)
    {
        if ($supplier->delete()) {
            return redirect('admin/supplier')->with('success', trans('supplier/message.success.delete'));
        } else {
            return Redirect::route('admin/supplier')->withInput()->with('error', trans('supplier/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $supplier = Supplier::get(['company', 'phone','name','phone','address', 'created_at']);

        return DataTables::of($supplier)
            ->editColumn('created_at', function (Supplier $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.supplier.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Supplier"></i></a>';
                $actions .= '<a href=' . route('admin.supplier.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Supplier"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
