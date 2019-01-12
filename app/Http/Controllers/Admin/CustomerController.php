<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index()
    {

        $customer = Customer::all();
        return view('admin.customer.index', compact('customer'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CustomerRequest $request)
    {

        $customer = new Customer();
        $customer->company = $request->company;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->member_type = $request->member_type;
        $customer->save();
        if ($customer->id) {
            return redirect('admin/customer')->with('success', trans('customer/message.success.create'));
        } else {
            return Redirect::route('admin/customer')->withInput()->with('error', trans('customer/message.error.create'));
        }

    }

    //Show
    public function show(Customer $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }

    //Edit
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    //Update
    public function update(CustomerRequest $request, $id)
    {        
        $customer = Customer::find($id);        
        $customer->company = $request->input('company');
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->member_type = $request->input('member_type');
        if ($customer->update()) {
            return redirect('admin/customer')->with('success', trans('customer/message.success.update'));
        } else {
            return Redirect::route('admin/customer')->withInput()->with('error', trans('customer/message.error.update'));
        }
    }


    public function getModalDelete(Customer $customer)
    {
        $model = 'customer';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.customer.delete', ['id' => $customer->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('customer/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function destroy(Customer $customer)
    {
        if ($customer->delete()) {
            return redirect('admin/customer')->with('success', trans('customer/message.success.delete'));
        } else {
            return Redirect::route('admin/customer')->withInput()->with('error', trans('customer/message.error.delete'));
        }
    }

//Table Data to index page
    public function data()
    {
        $customer = Customer::get(['company', 'phone','name','phone','address','member_type', 'created_at']);

        return DataTables::of($customer)
            ->editColumn('created_at', function (Customer $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.customer.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Customer"></i></a>';
                $actions .= '<a href=' . route('admin.customer.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Customer"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
