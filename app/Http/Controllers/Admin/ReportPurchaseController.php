<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Purchase;
use App\ProductSupplier;
use App\PurchaseDetail;
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


class ReportPurchaseController extends Controller
{
    public function index()
    {
$purchase = Purchase::all();
        return view('admin.report_purchase.index', compact('purchase'));
    }

    //Show
    public function show($id)
    {
        $purchase= Purchase::where('id',$id)->get();
       $purchase_detail = PurchaseDetail::where('purchase_id', $id)->get(); 
        return view('admin.report_purchase.show', compact('purchase','purchase_detail'));
    }
     public function search(Request $request)
    {

     $start = new Carbon($request->date);
     $end =$request->date2." 23:59:59";
      $purchase = Purchase::whereBetween('created_at', [$start, $end])->get();
        return view('admin.report_purchase.index', compact('purchase','request'));
     }

    public function print( $id)
    {
     $user= User::All()->first();
    $purchase= Purchase::where('id',$id)->get();
        $purchase_detail = PurchaseDetail::where('purchase_id', $id)->get(); 
        //return view('admin.report_purchase.pdf', compact('purchase','purchase_detail'));
         $pdf = PDF::loadView('admin.report_purchase.pdf',compact('purchase','purchase_detail','user'));
         return $pdf->stream();

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
