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
    <h1>{!! $purchase->title!!}</h1>
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
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-sm-11 col-md-12 col-full-width-right">
            <div class="purchase-detail-image mrg_btm15">
            <!-- /.purchase-detail-image -->
            <div class="the-box no-border purchase-detail-content">
                <p>
                    <span class="label label-danger square">{!! $purchase->created_at!!}</span>
                </p>
                <p class="text-justify">
                    {!! $purchase->supplier->company !!}
                </p>                
                <p>
                    {!! $purchase->note !!}                
                </p>
                <hr>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tr>
                        <td>Status </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{!! $purchase->status !!}</td>
                    </tr>
                    <tr>
                        <td>Down Payment </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{!! $purchase->down_payment !!}</td>
                    </tr>
                </table>
                    {!! Form::open(array('url' => URL::to('admin/purchase/received'), 'method' => 'post', 'class' => 'bf')) !!}
                    <input type="hidden" value="{{  $purchase->id }}" name="id" />
                    @if($purchase->status!='Received')
                    <button type="submit" class="btn btn-success">@lang('button.received')</button>
                    @endif
                    <a href="{!! URL::to('admin/purchase/') !!}"
                    class="btn btn-default">Back</a>
                    {!! Form::close() !!}

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
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/purchase_detail/create/' . $purchase->id) }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
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
                                <th style="width: 70px">@lang('purchase_detail/table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($purchase_detail))
                            @php $grandtotal = 0 @endphp                            
                                @foreach ($purchase_detail as $data)
                                  @php $cost =''  @endphp   
                                 @foreach($product_supplier as $pro)
                                    @if($pro->product_id==$data->product_id && $pro->supplier_id==$purchase->supplier_id)
                                    @php $cost =$pro->cost  @endphp
                                    @endif
                                @endforeach
                                    <tr>
                                        <td>{{ $data->product->name }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>Rp {{ number_format($cost,2) }}</td>
                                        <td>Rp {{ number_format($cost * $data->quantity,2) }} @php $grandtotal = $grandtotal + (($cost * $data->quantity)) @endphp</td>
                                        <td>
                                            
                                            <a href="{{ URL::to('admin/purchase_detail/delete', $data->id) }}" ><i class="livicon" data-name="remove-alt"
                                                                                data-size="18" data-loop="true" data-c="#f56954"
                                                                                data-hc="#f56954"
                                                                                title="@lang('purchase_detail/table.delete-data')"></i></a>
                                        </td>
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
                </div>
            </div>
        </div>
    <!--main content ends-->
</section>
    @stop
@section('footer_scripts')
    <script>
        $("img").addClass("img-responsive");
    </script>
@stop
