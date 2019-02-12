@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('purchase/title.purchasedetail')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/blog.css') }}" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>Report Purchase List</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li> @lang('purchase/title.purchase')</li>
        <li class="active">@lang('purchase/title.purchasedetail')</li>
    </ol>
</section>
<!--section ends-->
@foreach($purchase as $data1)
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-sm-11 col-md-12 col-full-width-right">
            <div class="purchase-detail-image mrg_btm15">
            <!-- /.purchase-detail-image -->
            <div class="the-box no-border purchase-detail-content">
                <p>
                    <span class="label label-danger square">{!! $data1->created_at!!}</span>
                </p>
                <p class="text-justify">
                    {!! $data1->supplier->company !!}
                </p>                
                <p>
                    {!! $data1->note !!}                
                </p>
                <hr>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tr>
                        <td>Status </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{!! $data1->status !!}</td>
                    </tr>
                    <tr>
                        <td>Down Payment </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{!! $data1->down_payment !!}</td>
                    </tr>
                </table>

            </div>
            <!-- /the.box .no-border --> </div>
        <!-- /.col-sm-9 --></div>

        <div class="col-sm-11 col-md-12 col-full-width-right">
        <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                                                         data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('purchase_detail/title.purchaselist')
                    </h4>
                </div>
                <br/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th>@lang('purchase_detail/table.product')</th>
                                <th>@lang('purchase_detail/table.quantity')</th>
                                <th>@lang('purchase_detail/table.price')</th>
                                <th>@lang('purchase_detail/table.subtotal')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($purchase_detail))
                            @php $grandtotal = 0 @endphp                            
                                @foreach ($purchase_detail as $data)
                                    <tr>
                                        <td>{{ $data->product->code }} - {{ $data->product->name }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>Rp {{ number_format($data->product->price,2) }}</td>
                                        <td>Rp {{ number_format($data->product->price * $data->quantity,2) }} @php $grandtotal = $grandtotal + (($data->product->price * $data->quantity)) @endphp</td>
                                    </tr>
                                @endforeach
                                <tr>
                                        <td colspan="2" >Total </td>
                                        <td >: </td>
                                        <td colspan="2">Rp {{ number_format($grandtotal,2) }}</td>
                                    </tr>

                            @endif
                            </tbody>
                        </table>                    
                    </div>
                    <a href="{!! URL::to('admin/report_purchase/print/'.$data1->id) !!}"
                    class="btn btn-warning" target="_blank">Print</a>
                </div>
            </div>
        </div>
    <!--main content ends-->
</section>
@endforeach
    @stop
@section('footer_scripts')
    <script>
        $("img").addClass("img-responsive");
    </script>
@stop
