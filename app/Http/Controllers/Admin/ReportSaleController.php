<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Sale;
use App\ProductSupplier;
use App\Product;
use App\SaleDetail;
use App\Customer;
use App\Supplier;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;
use PDF;
use App;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ReportSaleController extends Controller
{
    public function index()
    {

       
        $sale = Sale::all();
        $sale_detail= SaleDetail::all();
         $product = Product::all();
         $product_supplier = ProductSupplier::all();
        return view('admin.report_sale.index', compact('sale','sale_detail','product_supplier','product'));
    }

     public function search(Request $request)
    {

     $start = new Carbon($request->date);
     $end =$request->date2." 23:59:59";
      $sale = Sale::whereBetween('created_at', [$start, $end])->get();
        $sale_detail= SaleDetail::all();
         $product = Product::all();
         $product_supplier = ProductSupplier::all();
        return view('admin.report_sale.index', compact('sale','sale_detail','product_supplier','product','request'));
     }

    //Show
    public function show($id)
    {
       $sale= Sale::where('id',$id)->get();
       $sale_detail = SaleDetail::where('sale_id', $id)->get(); 
        return view('admin.report_sale.show', compact('sale','sale_detail'));
    }

    public function print($id)
    {
        $user= User::All()->first();
    $sale= Sale::where('id',$id)->get();
        $sale_detail = SaleDetail::where('sale_id', $id)->get(); 
       //return view('admin.report_sale.pdf', compact('sale','sale_detail'));
        $pdf = PDF::loadView('admin.report_sale.pdf',compact('sale','sale_detail','user'));
         return $pdf->stream('faktur.pdf',array('Attachment'=>0));
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
