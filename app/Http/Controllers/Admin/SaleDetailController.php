<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleDetailRequest;
use App\Sale;
use App\SaleDetail;
use App\Product;
use App\Supplier;
use App\ProductSupplier;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response; 
use Sentinel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    
    public function create($sale_id)
    {
        $product = Product::pluck('name', 'id');
        $supplier = Supplier::pluck('company', 'id');
        return view('admin.sale_detail.create', compact('product', 'sale_id', 'supplier'));
    }

    public function store(SaleDetailRequest $request)
    {   

       $datacek=ProductSupplier::where('product_id',$request->product_id)->where('supplier_id',$request->supplier_id)->get();
        foreach ($datacek as $cek) {
         echo   $cekq=$cek->quantity;
        }
        echo $request->quantity;
         if($request->quantity <= $cekq){
        $data = new SaleDetail();
        $data->sale_id = $request->sale_id;
        $data->product_id = $request->product_id;
        $data->supplier_id = $request->supplier_id;
        $data->quantity = $request->quantity;
        $data->save();
        if ($data->id) {
            return redirect('admin/sale/'.$request->sale_id)->with('success', trans('sale_detail/message.success.create'));
        } else {
            return Redirect::route('admin/sale'.$request->sale_id)->withInput()->with('error', trans('sale_detail/message.error.create'));
        }
    }else{
            return Redirect('admin/sale_detail/create/'.$request->sale_id)->withInput()->with('error', trans('Quantity'));
    }


    }

    //Edit
    public function edit(SaleDetail $sale_detail)
    {
        $product = Product::pluck('name', 'id');
        $supplier = Supplier::pluck('company', 'id');
        return view('admin.sale_detail.edit', compact('sale_detail','product', 'supplier'));
    }

    //Update
    public function update(SaleDetailRequest $request, $id)
    {        
        $data = SaleDetail::find($id);        
        $data->sale_id = $request->sale_id;
        $data->product_id = $request->product_id;
        $data->supplier_id = $request->supplier_id;
        $data->quantity = $request->quantity;
        if ($data->update()) {
            return redirect('admin/sale/'.$request->sale_id)->with('success', trans('sale_detail/message.success.update'));
        } else {
            return Redirect::route('admin/sale/'.$request->sale_id)->withInput()->with('error', trans('sale_detail/message.error.update'));
        }
    }

    public function destroy($id)
    {
        $data = SaleDetail::find($id);
        if ($data->delete()) {
            return redirect('admin/sale/'.$id)->with('success', trans('sale_detail/message.success.delete'));
        } else {
            return redirect('admin/sale/'.$id)->with('error', trans('sale_detail/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $data = SaleDetail::get(['id', 'created_at']);

        return DataTables::of($data)
            ->editColumn('created_at', function (Sale $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.sale_detail.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Sale"></i></a>';
                $actions .= '<a href=' . route('admin.sale_detail.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Sale"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function ajax()
    {

        

    }

}
