<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseDetailRequest;
use App\Purchase;
use App\PurchaseDetail;
use App\Product;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class PurchaseDetailController extends Controller
{
    
    public function create($purchase_id)
    {
        $product = Product::pluck('name', 'id');
        return view('admin.purchase_detail.create', compact('product', 'purchase_id'));
    }

    public function store(PurchaseDetailRequest $request)
    {

        $data = new PurchaseDetail();
        $data->purchase_id = $request->purchase_id;
        $data->product_id = $request->product_id;
        $data->quantity = $request->quantity;
        $data->save();
        if ($data->id) {
            return redirect('admin/purchase/'.$request->purchase_id)->with('success', trans('purchase_detail/message.success.create'));
        } else {
            return Redirect::route('admin/purchase'.$request->purchase_id)->withInput()->with('error', trans('purchase_detail/message.error.create'));
        }

    }

    //Edit
    public function edit(PurchaseDetail $purchase_detail)
    {
        $product = Product::pluck('name', 'id');
        return view('admin.purchase_detail.edit', compact('purchase_detail','product'));
    }

    //Update
    public function update(PurchaseDetailRequest $request, $id)
    {        
        $data = PurchaseDetail::find($id);        
        $data->purchase_id = $request->purchase_id;
        $data->product_id = $request->product_id;
        $data->quantity = $request->quantity;
        if ($data->update()) {
            return redirect('admin/purchase/'.$request->purchase_id)->with('success', trans('purchase_detail/message.success.update'));
        } else {
            return Redirect::route('admin/purchase/'.$request->purchase_id)->withInput()->with('error', trans('purchase_detail/message.error.update'));
        }
    }

    public function destroy($id)
    {
        $data = PurchaseDetail::find($id);
        if ($data->delete()) {
            return redirect('admin/purchase/'.$id)->with('success', trans('purchase_detail/message.success.delete'));
        } else {
            return redirect('admin/purchase/'.$id)->with('error', trans('purchase_detail/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $data = PurchaseDetail::get(['id', 'created_at']);

        return DataTables::of($data)
            ->editColumn('created_at', function (Purchase $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.purchase_detail.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Purchase"></i></a>';
                $actions .= '<a href=' . route('admin.purchase_detail.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Purchase"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
