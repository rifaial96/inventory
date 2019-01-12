@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('sale/title.saledetail')
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
    <h1>{!! $sale->title!!}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li> @lang('sale/title.sale')</li>
        <li class="active">@lang('sale/title.saledetail')</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-sm-11 col-md-12 col-full-width-right">
            <div class="sale-detail-image mrg_btm15">
            <!-- /.sale-detail-image -->
            <div class="the-box no-border sale-detail-content">
                <p>
                    <span class="label label-danger square">{!! $sale->created_at!!}</span>
                </p>
                <p class="text-justify">
                    {!! $sale->customer->company !!}
                </p>                
                <p>
                    {!! $sale->note !!}                
                </p>
                <hr>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tr>
                        <td>Status </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{!! $sale->status !!}</td>
                    </tr>
                    <tr>
                        <td>Payment Status </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{!! $sale->payment_status !!}</td>
                    </tr>
                </table>
                @if($sale->status!='Completed')
                <a href="{!! URL::to('admin/sale/completed/'.$sale->id) !!}"
                    class="btn btn-danger">@lang('button.completed')</a>
                @endif
                <a href="{!! URL::to('admin/sale/') !!}"
                    class="btn btn-success">Back</a>
                    
            </div>
            <!-- /the.box .no-border --> </div>
        <!-- /.col-sm-9 --></div>

        <div class="col-sm-11 col-md-12 col-full-width-right">
        <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                                                         data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('sale_detail/title.salelist')
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/sale_detail/create/' . $sale->id) }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th>@lang('sale_detail/table.product')</th>
                                <th>@lang('sale_detail/table.supplier')</th>
                                <th>@lang('sale_detail/table.quantity')</th>
                                <th>@lang('sale_detail/table.price')</th>
                                <th>@lang('sale_detail/table.discount')</th>
                                <th>@lang('sale_detail/table.subtotal')</th>
                                <th style="width: 70px">@lang('sale_detail/table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($sale_detail))
                                @php $grandtotal = 0 @endphp
                                @php $balance = 0 @endphp
                                @foreach ($sale_detail as $data)
                                    <tr>
                                        @php $discount = 0 @endphp
                                        @if ($sale->customer->member_type == "Gold") @php $discount = $data->product->price * 0.3 @endphp @endif
                                        @if ($sale->customer->member_type == "Silver") @php $discount = $data->product->price * ($data->product->category->discount / 100 ) @endphp @endif                                        
                                                                        
                                        <td>{{ $data->product->name }}</td>
                                        <td>{{ $data->supplier->company }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>Rp {{ number_format($data->product->price,2) }}</td>
                                        <td>Rp {{ number_format($discount, 2) }}
                                        </td>
                                        <td>Rp {{ number_format(($data->product->price * $data->quantity) - $discount,2) }} @php $grandtotal = $grandtotal + (($data->product->price * $data->quantity) - $discount) @endphp </td>
                                        <td>
                                            <a href="{{ URL::to('admin/sale_detail/' . $data->id . '/edit' ) }}"><i class="livicon"
                                                                                                            data-name="edit"
                                                                                                            data-size="18"
                                                                                                            data-loop="true"
                                                                                                            data-c="#428BCA"
                                                                                                            data-hc="#428BCA"
                                                                                                            title="@lang('sale_detail/table.update-data')"></i></a>
                                            <a href="{{ URL::to('admin/sale_detail/delete', $data->id) }}" ><i class="livicon" data-name="remove-alt"
                                                                                data-size="18" data-loop="true" data-c="#f56954"
                                                                                data-hc="#f56954"
                                                                                title="@lang('sale_detail/table.delete-data')"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                {!! Form::open(array('url' => URL::to('admin/sale/save'), 'method' => 'post', 'class' => 'bf')) !!}
                                <input type="hidden" value="{{  $sale->id }}" name="id" />
                                @if ($sale->amount_paid > 0) @php $balance = $grandtotal - $sale->amount_paid @endphp @endif
                                    <tr>
                                        <td colspan="4" >Total </td>
                                        <td >: </td>
                                        <td colspan="2"><input type="hidden" id="total" value="{{ $grandtotal }}">Rp {{ number_format($grandtotal,2) }}</td>
                                    </tr>
                                    @if ($sale->status == "Completed") 
                                    <tr>
                                        <td colspan="4" >Paid </td>
                                        <td >: </td>
                                        <td colspan="2"> 
                                        Rp {{ number_format($sale->amount_paid,2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" >Balance </td>
                                        <td >: </td>
                                        <td colspan="2"> 
                                        Rp {{ number_format($balance,2) }}
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="4" >Paid </td>
                                        <td >: </td>
                                        <td colspan="2"> 
                                            <div class="form-group {{ $errors->first('amount_paid', 'has-error') }}">
                                                <input name="amount_paid" value="{{ $sale->amount_paid }}" class="form-control input-lg" id="paid" onchange="Balance();"  placeholder="{{ trans('sale_detail/form.ph-paid') }}"
                                                <span class="help-block">{{ $errors->first('amount_paid', ':message') }}</span>
                                            </div>                                                                                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" >Balance </td>
                                        <td >: </td>
                                        <td colspan="2"> 
                                            <div class="form-group {{ $errors->first('balance', 'has-error') }}">
                                            <input name="balance" value="{{ $balance }}" class="form-control input-lg" id="balance"  placeholder="{{ trans('sale_detail/form.ph-balance') }}"
                                                <span class="help-block">{{ $errors->first('balance', ':message') }}</span>
                                            </div>                                                                                                        
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td colspan="4"> </td>
                                        <td >: </td>
                                        <td colspan="2">
                                        @if ($sale->status != "Completed" && $grandtotal>0)
                                            <button type="submit" class="btn btn-primary"> Save </button>
                                        @endif
                                        
                                        </td>
                                    </tr>
                                {!! Form::close() !!}
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

        function Balance()
        {
            var total = document.getElementById("total").value;
            var paid = document.getElementById("paid").value;
            var balance = total - paid;
            document.getElementById("balance").value = balance;
        }        

    </script>
@stop
