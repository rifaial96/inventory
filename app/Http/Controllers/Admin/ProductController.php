<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductSupplier;
use App\Category;
use App\Supplier;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;
use PDF;
use App;
use App\Http\Requests;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::pluck('category', 'id');
        return view('admin.product.create', compact('category'));
    }

    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->alert_quantity = $request->alert_quantity;
        $product->warehouse_quantity = $request->warehouse_quantity;
        $product->save();
        if ($product->id) {
            return redirect('admin/product')->with('success', trans('product/message.success.create'));
        } else {
            return Redirect::route('admin/product')->withInput()->with('error', trans('product/message.error.create'));
        }

    }

    //Show
    public function show(Product $product)
    {
        $warehouse = ProductSupplier::where('product_id', $product->id)->sum('quantity');
        $product_supplier = ProductSupplier::where('product_id', $product->id)->get(); 
        return view('admin.product.show', compact('product', 'product_supplier', 'warehouse'));
    }

    public function barcode($code)
    {
        $product = Product::find($code); 
        return view('admin.product.print', compact('product'));
    }  

    public function print(Request $request) {

    $size=$request->size;
    $jml= $request->jml;
    $product = Product::find($request->id);
    $warehouse = ProductSupplier::where('product_id', $request->id)->sum('quantity');
        
 
   $pdf = PDF::loadView('admin.product.pdf',compact('product','jml','warehouse','size'));
     return $pdf->stream();

    }

    //Edit
    public function edit(Product $product)
    {
        $category = Category::pluck('category', 'id');
        return view('admin.product.edit', compact('product', 'category'));
    }

    //Update
    public function update(ProductRequest $request, $id)
    {        
        $product = Product::find($id);        
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->alert_quantity = $request->input('alert_quantity');
        $product->warehouse_quantity = $request->input('warehouse_quantity');
        if ($product->update()) {
            return redirect('admin/product')->with('success', trans('product/message.success.update'));
        } else {
            return Redirect::route('admin/product')->withInput()->with('error', trans('product/message.error.update'));
        }
    }


    public function getModalDelete(Product $product)
    {
        $model = 'product';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.product.delete', ['id' => $product->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('product/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect('admin/product')->with('success', trans('product/message.success.delete'));
        } else {
            return Redirect::route('admin/product')->withInput()->with('error', trans('product/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $product = Product::get(['id', 'created_at']);

        return DataTables::of($product)
            ->editColumn('created_at', function (Product $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.product.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Product"></i></a>';
                $actions .= '<a href=' . route('admin.product.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Product"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
