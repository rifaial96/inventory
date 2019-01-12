<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Sale;
use App\ProductSupplier;
use App\SaleDetail;
use App\Customer;
use App\Supplier;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class SaleController extends Controller
{
    public function index()
    {

        $sale = Sale::all();
        return view('admin.sale.index', compact('sale'));
    }

    public function create()
    {
        $customer = Customer::pluck('company', 'id');
        return view('admin.sale.create', compact('customer'));
    }

    public function store(SaleRequest $request)
    {

        $sale = new Sale();
        $sale->customer_id = $request->customer_id;
        $sale->note = $request->note;
        $sale->status = $request->status;
        $sale->payment_status = $request->payment_status;
        $sale->save();
        if ($sale->id) {
            return redirect('admin/sale')->with('success', trans('sale/message.success.create'));
        } else {
            return Redirect::route('admin/sale')->withInput()->with('error', trans('sale/message.error.create'));
        }

    }

    //Show
    public function show(Sale $sale)
    {
        $sale_detail = SaleDetail::where('sale_id', $sale->id)->get(); 
        return view('admin.sale.show', compact('sale', 'sale_detail'));
    }

    //Edit
    public function edit(Sale $sale)
    {
        $customer = Customer::pluck('company', 'id');
        return view('admin.sale.edit', compact('sale', 'customer'));
    }

    //Update
    public function update(SaleRequest $request, $id)
    {        
        $sale = Sale::find($id);        
        $sale->customer_id = $request->input('customer_id');
        $sale->note = $request->input('note');
        $sale->payment_status = $request->input('payment_status');
        if ($sale->update()) {
            return redirect('admin/sale')->with('success', trans('sale/message.success.update'));
        } else {
            return Redirect::route('admin/sale')->withInput()->with('error', trans('sale/message.error.update'));
        }
    }

    //Update Status Completed
    public function completed($id)
    {   
        $sale = Sale::find($id);
        if(!is_null($sale)) {
            $sale_detail = Saledetail::where('sale_id', $sale->id)->get();
            $sale->status = "Completed";
            if ($sale->update()) {             
                foreach ($sale_detail as $data) {
                    $product = ProductSupplier::where('product_id', $data->product_id)->where('supplier_id', $data->supplier_id)->get();
                    if (!is_null($product)) {
                        foreach ($product as $prd) {
                            $prd->quantity = $prd->quantity - $data->quantity;
                            $prd->update();
                        }
                    }
                }
                return redirect('admin/sale')->with('success', trans('sale/message.success.update'));
            } else {
                return Redirect::route('admin/sale')->withInput()->with('error', trans('sale/message.error.update'));
            }
                //redirect or show an error message    
        }        
    }

    //Save Paid
    public function savePaid(SaleRequest $request)
    {   
        $sale = Sale::find($request->input('id'));
        $sale_detail = Saledetail::where('sale_id', $sale->id)->get();
        if(!is_null($sale)) {
            $sale->amount_paid = $request->input('amount_paid');
            if ($sale->update()) {             
                return redirect('admin/sale')->with('success', trans('sale/message.success.update'));
            } else {
                return Redirect::route('admin/sale')->withInput()->with('error', trans('sale/message.error.update'));
            }
                //redirect or show an error message    
        }        
    }
    

    public function getModalDelete(Sale $sale)
    {
        $model = 'sale';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.sale.delete', ['id' => $sale->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('sale/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy(Sale $sale)
    {
        if ($sale->delete()) {
            return redirect('admin/sale')->with('success', trans('sale/message.success.delete'));
        } else {
            return Redirect::route('admin/sale')->withInput()->with('error', trans('sale/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $sale = Sale::get(['id', 'created_at']);

        return DataTables::of($sale)
            ->editColumn('created_at', function (Sale $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.sale.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Sale"></i></a>';
                $actions .= '<a href=' . route('admin.sale.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Sale"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
