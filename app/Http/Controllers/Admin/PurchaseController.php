<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Purchase;
use App\PurchaseDetail;
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

class PurchaseController extends Controller
{
    public function index()
    {

        $purchase = Purchase::all();
        return view('admin.purchase.index', compact('purchase'));
    }

    public function create()
    {
        $supplier = Supplier::pluck('company', 'id');
        return view('admin.purchase.create', compact('supplier'));
    }

    public function store(PurchaseRequest $request)
    {

        $purchase = new Purchase();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->status = $request->status;
        $purchase->down_payment = $request->down_payment;
        $purchase->note = $request->note;
        $purchase->save();
        if ($purchase->id) {
            return redirect('admin/purchase')->with('success', trans('purchase/message.success.create'));
        } else {
            return Redirect::route('admin/purchase')->withInput()->with('error', trans('purchase/message.error.create'));
        }

    }

    //Show
    public function show(Purchase $purchase)
    {
        $purchase_detail = PurchaseDetail::where('purchase_id', $purchase->id)->get();
        $product_supplier = ProductSupplier::where('supplier_id',$purchase->supplier_id)->get(); 
        return view('admin.purchase.show', compact('purchase', 'purchase_detail','product_supplier'));
    }

    public function print($id)
    {
       $purchase_detail = PurchaseDetail::where('purchase_id',$id)->get(); 
    
   $pdf = PDF::loadView('admin.purchase.pdf',compact('purchase_detail'));
     return $pdf->stream();
    }

    //Edit
    public function edit(Purchase $purchase)
    {
        $supplier = Supplier::pluck('company', 'id');
        return view('admin.purchase.edit', compact('purchase', 'supplier'));
    }

    //Update
    public function update(PurchaseRequest $request, $id)
    {        
        $purchase = Purchase::find($id);        
        $purchase->supplier_id = $request->supplier_id;
        $purchase->status = $request->status;
        $purchase->down_payment = $request->down_payment;
        $purchase->note = $request->note;
        if ($purchase->update()) {
            return redirect('admin/purchase')->with('success', trans('purchase/message.success.update'));
        } else {
            return Redirect::route('admin/purchase')->withInput()->with('error', trans('purchase/message.error.update'));
        }
    }

    //Update Status Received
    public function received(PurchaseRequest $request)
    {   
        $purchase = Purchase::find($request->input('id'));
       $purchase_detail = Purchasedetail::where('purchase_id', $purchase->id)->get();
        if(!is_null($purchase)) {
            $purchase->status = "Received";
            if ($purchase->update()) {             
                foreach ($purchase_detail as $data) {     
                  $product = ProductSupplier::where('product_id', $data->product_id)->where('supplier_id', $purchase->supplier_id)->get();
                    if (!is_null($product)) {
                        foreach ($product as $prd) {
                            $prd->quantity = $prd->quantity + $data->quantity;
                           $prd->update();
                        }
                    }
                }
                return redirect('admin/purchase')->with('success', trans('purchase/message.success.update'));
            } else {
               return Redirect::route('admin/purchase')->withInput()->with('error', trans('purchase/message.error.update'));
            }
                //redirect or show an error message    
        }        
    }

    public function getModalDelete(Purchase $purchase)
    {
        $model = 'purchase';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.purchase.delete', ['id' => $purchase->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('purchase/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy(Purchase $purchase)
    {
        if ($purchase->delete()) {
            return redirect('admin/purchase')->with('success', trans('purchase/message.success.delete'));
        } else {
            return Redirect::route('admin/purchase')->withInput()->with('error', trans('purchase/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $purchase = Purchase::get(['id', 'created_at']);

        return DataTables::of($purchase)
            ->editColumn('created_at', function (Purchase $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.purchase.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Purchase"></i></a>';
                $actions .= '<a href=' . route('admin.purchase.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Purchase"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
