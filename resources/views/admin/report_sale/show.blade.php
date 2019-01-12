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
    <h1>Report Sale</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li> @lang('report_sale/title.sale')</li>
        <li class="active">@lang('sale/title.reportsaledetail')</li>
    </ol>
</section>
<!--section ends-->
@foreach($sale as $data1)
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-sm-11 col-md-12 col-full-width-right">
            <div class="sale-detail-image mrg_btm15">
            <!-- /.sale-detail-image -->
            
            <div class="the-box no-border sale-detail-content">
                <p>
                    <span class="label label-danger square">{!! $data1->created_at !!}</span>
                </p>
                <p class="text-justify">
                {!! $data1->customer->company !!}
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
                        <td>Payment Status </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{!! $data1->payment_status !!}</td>
                    </tr>
                </table>
                                   
            </div>
            
            <!-- /the.box .no-border --> </div>
        <!-- /.col-sm-9 --></div>

        <div class="col-sm-11 col-md-12 col-full-width-right">
        <div class="panel panel-primary ">
            
                <br/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th>@lang('sale_detail/table.product')</th>
                                <th>@lang('sale_detail/table.discount')</th>
                                <th>@lang('sale_detail/table.quantity')</th>
                                <th>@lang('sale_detail/table.price')</th>
                                <th>@lang('sale_detail/table.subtotal')</th>
                  
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($sale_detail))
                                @php $grandtotal = 0 @endphp
                                @php $balance = 0 @endphp
                                @php $discounttot = 0 @endphp
                                @foreach ($sale_detail as $data)
                                    <tr>
                                    @php $discount = 0 @endphp
                                         @php $disc=0 @endphp
                                        @if ($data1->customer->member_type == "Gold") @php $discount = $data->product->price * 0.3; $disc=30 @endphp @endif
                                        @if ($data1->customer->member_type == "Silver") @php $discount = $data->product->price * ($data->product->category->discount / 100 );$disc=$data->product->category->discount @endphp @endif                                        
                                                                        
                                        <td>{{ $data->product->code }} - {{ $data->product->name }}</td>
                                          <td>{{ $disc }}%</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td style="text-align:right"> {{ number_format($data->product->price,2) }}</td>
                                        <td style="text-align:right"> {{ number_format(($data->product->price * $data->quantity) - $discount,2) }} @php $grandtotal = $grandtotal + (($data->product->price * $data->quantity) - $discount) @endphp </td>
                                        @php $discounttot += $discount   @endphp
                                    </tr>
                                @endforeach
                                {!! Form::open(array('url' => URL::to('admin/sale/save'), 'method' => 'post', 'class' => 'bf')) !!}
                                <input type="hidden" value="{{  $data1->id }}" name="id" />
                                @if ($data1->amount_paid > 0) @php $balance = $grandtotal - $data1->amount_paid @endphp @endif
                                    <tr>
                                        
                                        <td colspan="3" style="text-align:right" >Total(Rp)</td>
                                        <td >: </td>
                                        <td colspan="2" style="text-align:right"><input type="hidden" id="total" value="{{ $grandtotal }}"> {{ number_format($grandtotal,2) }}</td>
                                    </tr>
                                    <tr>
                                        
                                        <td colspan="3"  style="text-align:right">Discount(Rp)</td>
                                        <td >: </td>
                                        <td colspan="2" style="text-align:right">( {{ number_format($discounttot,2) }})</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align:right">Paid(Rp)</td>
                                        <td >: </td>
                                        <td colspan="2" style="text-align:right"> 
                                         {{ number_format($data1->amount_paid,2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align:right">Balance(Rp)</td>
                                        <td >: </td>
                                        <td colspan="2" style="text-align:right"> 
                                    {{ number_format($balance,2) }}  </td>
                                    </tr>
                                  
        
                                {!! Form::close() !!}
                            @endif
                            </tbody>
                        </table>                    
                    </div>
                    <a href="{!! URL::to('admin/report_sale/print/'.$data1->id) !!}"
                    class="btn btn-danger" target="_blank">Print</a>
                </div>
            </div>
        </div>
    <!--main content ends-->
</section>
@endforeach
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
