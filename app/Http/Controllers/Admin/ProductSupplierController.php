<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSupplierRequest;
use App\Product;
use App\ProductSupplier;
use App\Category;
use App\Supplier;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class ProductSupplierController extends Controller
{
    public function index()
    {

        $data = ProductSupplier::all();
        return view('admin.product_supplier.index', compact('data'));
    }

    public function create($product_id)
    {
        $supplier = Supplier::pluck('company', 'id');
        return view('admin.product_supplier.create', compact('supplier', 'product_id'));
    }

    public function store(ProductSupplierRequest $request)
    {

        $data = new ProductSupplier();
        $data->product_id = $request->product_id;
        $data->supplier_id = $request->supplier_id;
        $data->cost = $request->cost;
        $data->quantity = $request->quantity;

        $data->save();
        if ($data->id) {
            return redirect('admin/product/'.$request->product_id)->with('success', trans('product_supplier/message.success.create'));
        } else {
            return Redirect::route('admin/product'.$request->product_id)->withInput()->with('error', trans('product_supplier/message.error.create'));
        }

    }

    //Show
    public function show(Product $product)
    {
        return view('admin.product_supplier.show', compact('product'));
    }

    //Edit
    public function edit(ProductSupplier $product_supplier)
    {
        $supplier = Supplier::pluck('company', 'id');
        return view('admin.product_supplier.edit', compact('product_supplier','supplier'));
    }

    //Update
    public function update(ProductSupplierRequest $request, $id)
    {        
        $data = ProductSupplier::find($id);        
        $data->product_id = $request->product_id;
        $data->cost = $request->cost;
        $data->quantity = $request->quantity;

        if ($data->update()) {
            return redirect('admin/product/'.$request->product_id)->with('success', trans('product_supplier/message.success.update'));
        } else {
            return Redirect::route('admin/product/'.$request->product_id)->withInput()->with('error', trans('product_supplier/message.error.update'));
        }
    }


    public function getModalDelete(ProductSupplier $data)
    {
        $model = 'product_supplier';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.product_supplier.delete', ['id' => $data->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('product_supplier/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy($id)
    {
        $data = ProductSupplier::find($id);
        if ($data->delete()) {
            return redirect('admin/product/'.$id)->with('success', trans('product_supplier/message.success.delete'));
        } else {
            return redirect('admin/product/'.$id)->with('error', trans('product_supplier/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $data = ProductSupplier::get(['id', 'created_at']);

        return DataTables::of($data)
            ->editColumn('created_at', function (Product $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.product_supplier.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Product"></i></a>';
                $actions .= '<a href=' . route('admin.product_supplier.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Product"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
