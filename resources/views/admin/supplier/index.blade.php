@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('supplier/title.supplierlist')
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>@lang('supplier/title.supplierlist')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16"
                                                             data-color="#000"></i>
                    @lang('general.dashboard')
                </a>
            </li>
            <li><a href="#">@lang('supplier/title.supplier')</a></li>
            <li class="active">@lang('supplier/title.supplierlist')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                                                         data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('supplier/title.supplierlist')
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/supplier/create') }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th>@lang('supplier/table.company')</th>
                                <th>@lang('supplier/table.name')</th>
                                <th>@lang('supplier/table.phone')</th>
                                <th>@lang('supplier/table.address')</th>
                                <th>@lang('supplier/table.city')</th>
                                <th>@lang('supplier/table.created_at')</th>
                                <th style="width: 70px">@lang('supplier/table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($supplier))
                                @foreach ($supplier as $data)
                                    <tr>
                                        <td>{{ $data->company }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->city }}</td>
                                        <td>{{ $data->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/supplier/' . $data->id . '/edit' ) }}"><i class="livicon"
                                                                                                            data-name="edit"
                                                                                                            data-size="18"
                                                                                                            data-loop="true"
                                                                                                            data-c="#428BCA"
                                                                                                            data-hc="#428BCA"
                                                                                                            title="@lang('supplier/table.update-supplier')"></i></a>
                                            <a href="{{ route('admin.supplier.confirm-delete', $data->id) }}" data-toggle="modal"
                                            data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                                                                                data-size="18" data-loop="true" data-c="#f56954"
                                                                                data-hc="#f56954"
                                                                                title="@lang('supplier/table.delete-supplier')"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
   <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}">
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

    <script>
        $('#table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );

       </script>
   

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
@stop
