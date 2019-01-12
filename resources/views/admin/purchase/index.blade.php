@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('purchase/title.purchaselist')
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
        <h1>@lang('purchase/title.purchaselist')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16"
                                                             data-color="#000"></i>
                    @lang('general.dashboard')
                </a>
            </li>
            <li><a href="#">@lang('purchase/title.purchase')</a></li>
            <li class="active">@lang('purchase/title.purchaselist')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                                                         data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('purchase/title.purchaselist')
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/purchase/create') }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th>@lang('purchase/table.supplier')</th>
                                <th>@lang('purchase/table.status')</th>
                                <th>@lang('purchase/table.down_payment')</th>
                                <th>@lang('purchase/table.date')</th>
                                <th style="width: 70px">@lang('purchase/table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($purchase))
                                @foreach ($purchase as $data)
                                    <tr>
                                        <td>{{ $data->supplier->company }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->down_payment }}</td>
                                        <td>{{ $data->created_at->format('d-m-Y')}}</td>
                                        <td>
                                        <a href="{{ URL::to('admin/purchase/' . $data->id ) }}"><i class="livicon"
                                                                                                     data-name="info"
                                                                                                     data-size="18"
                                                                                                     data-loop="true"
                                                                                                     data-c="#428BCA"
                                                                                                     data-hc="#428BCA"
                                                                                                     title="@lang('purchase/table.detail-purchase')"></i></a>

                                            <a href="{{ URL::to('admin/purchase/' . $data->id . '/edit' ) }}"><i class="livicon"
                                                                                                            data-name="edit"
                                                                                                            data-size="18"
                                                                                                            data-loop="true"
                                                                                                            data-c="#428BCA"
                                                                                                            data-hc="#428BCA"
                                                                                                            title="@lang('purchase/table.update-purchase')"></i></a>
                                            <a href="{{ route('admin.purchase.confirm-delete', $data->id) }}" data-toggle="modal"
                                            data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                                                                                data-size="18" data-loop="true" data-c="#f56954"
                                                                                data-hc="#f56954"
                                                                                title="@lang('purchase/table.delete-purchase')"></i></a>
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
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>

    <script>
        $(function () {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.sale.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'sale', name: 'title'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ]
            });
            table.on('draw', function () {
                $('.livicon').each(function () {
                    $(this).updateLivicon();
                });
            });
        });

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
