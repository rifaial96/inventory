<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CashRequest;
use App\Cash;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class CashController extends Controller
{
    public function index()
    {

        $cash = Cash::all();
        return view('admin.cash.index', compact('cash'));
    }

    public function create()
    {
        return view('admin.cash.create');
    }

    public function store(CashRequest $request)
    {

        $cash = new Cash();
        $cash->date_flow = $request->date_flow;
        $cash->description = $request->description;
        $cash->money = $request->money;
        $cash->status = $request->status;
        $cash->save();
        if ($cash->id) {
            return redirect('admin/cash')->with('success', trans('cash/message.success.create'));
        } else {
            return Redirect::route('admin/cash')->withInput()->with('error', trans('cash/message.error.create'));
        }

    }

    //Show
    public function show(Cash $cash)
    {
        return view('admin.cash.show', compact('cash'));
    }

    //Edit
    public function edit(Cash $cash)
    {
        return view('admin.cash.edit', compact('cash'));
    }

    //Update
    public function update(CashRequest $request, $id)
    {        
        $cash = Cash::find($id);
        $cash->date_flow = $request->input('date_flow');
        $cash->description = $request->input('description');
        $cash->money = $request->input('money');
        $cash->status = $request->input('status');
        if ($cash->update()) {
            return redirect('admin/cash')->with('success', trans('cash/message.success.update'));
        } else {
            return Redirect::route('admin/cash')->withInput()->with('error', trans('cash/message.error.update'));
        }
    }


    public function getModalDelete(Cash $cash)
    {
        $model = 'cash';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.cash.delete', ['id' => $cash->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('cash/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy(Cash $cash)
    {
        if ($cash->delete()) {
            return redirect('admin/cash')->with('success', trans('cash/message.success.delete'));
        } else {
            return Redirect::route('admin/cash')->withInput()->with('error', trans('cash/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $cash = Cash::get(['id', 'cash','discount', 'created_at']);

        return DataTables::of($cash)
            ->editColumn('created_at', function (Cash $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.cash.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Cash"></i></a>';
                $actions .= '<a href=' . route('admin.cash.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Cash"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
