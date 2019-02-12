@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('cash/title.cashlist')
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
        <h1>Report Cash List</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16"
                                                             data-color="#000"></i>
                    @lang('general.dashboard')
                </a>
            </li>
            <li><a href="#">Report Cash</a></li>
            <li class="active">Report Cash List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                                                         data-loop="true" data-c="#fff" data-hc="white"></i>
                      Report Cash List
                    </h4>
                   
                </div>
                <br/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th>@lang('cash/table.date')</th>
                                <th>@lang('cash/table.description')</th>
                                <th>@lang('cash/table.debet')</th>
                                <th>@lang('cash/table.credit')</th>
                                <th>@lang('cash/table.saldo')</th>
                                <th>@lang('cash/table.created_at')</th>
                                <th style="width: 70px">@lang('cash/table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($cash))
                                <?php $saldo = 0; ?>
                                @foreach ($cash as $data)
                                    <tr>
                                        <td>{{ $data->date_flow }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>Rp @if ($data->status == 1) {{ number_format($data->money,2) }} <?php $saldo = $saldo + $data->money; ?> @else - @endif</td>
                                        <td>Rp @if ($data->status == 0) {{ number_format($data->money,2) }} <?php $saldo = $saldo - $data->money; ?> @else - @endif</td>
                                        <td>Rp {{ number_format($saldo,2) }}</td>
                                        <td>{{ $data->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/cash/' . $data->id . '/edit' ) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="@lang('cash/table.update-cash')"></i></a>
                                           
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
