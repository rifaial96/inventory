@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('product/title.productdetail')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/blog.css') }}" />
<style type="text/css">
    #sum{
        width: 70px;
        float: left;
    }
    .float{
        float: left;
    }
    .sel{
        width:100px;
        float:left;
    }
</style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>{!! $product->title!!}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li> @lang('product/title.product')</li>
        <li class="active">@lang('product/title.productdetail')</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-sm-11 col-md-12 col-full-width-right">
            <div class="product-detail-image mrg_btm15">
            Barcode : 	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->code, 'C93')}}" alt="barcode" />          
            <!-- /.product-detail-image -->
            <div class="the-box no-border product-detail-content">
                <p>
                    <span class="label label-danger square">{!! $product->created_at!!}</span>
                </p>
                <p class="text-justify">
                {!! $product->code !!} - {!! $product->name !!}
                </p>                
                <p><strong>Category:</strong> {!! $product->category->category !!}</p>
                <hr>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tr>
                        <td>Product Price </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>Rp {!! number_format($product->price,2) !!}</td>
                    </tr>
                    <tr>
                        <td>Alert Quantity </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td> {!! $product->alert_quantity !!}</td>
                    </tr>
                    <tr>
                        <td>Warehouse Quantity </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td> {!! $warehouse !!}</td>
                    </tr>
  
                </table> 
        
            <form action="{{url('admin/product/print')}}" method='POST'>
            {{csrf_field()}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                {!! Form::number('jml',1,array('id'=>'sum','class'=>'form-control')) !!}
                <select class='form-control sel' name='size' >
                    <option value='kecil'>Kecil</option>
                    <option value='sedang'>Sedang</option>
                    <option value='besar'>Besar</option>
                </select>
                {!! Form::hidden('id',$product->id) !!}
                {!! Form::button('Print Barcode',array('type'=>'submit','class'=>'btn btn-warning float')) !!}
                </form> 
                    
                <a href="{!! URL::to('admin/product') !!}" class="btn btn-success">Back</a>

            </div>
            <!-- /the.box .no-border --> </div>
        <!-- /.col-sm-9 --></div>

        <div class="col-sm-11 col-md-12 col-full-width-right">
        <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                                                         data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('product_supplier/title.productlist')
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/product_supplier/create/' . $product->id) }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th>@lang('product_supplier/table.company')</th>
                                <th>@lang('product_supplier/table.cost')</th>
                                <th>@lang('product_supplier/table.quantity')</th>
                                <th>@lang('product_supplier/table.created_at')</th>
                                <th style="width: 70px">@lang('product_supplier/table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($product_supplier))
                                @foreach ($product_supplier as $data)
                                    <tr>
                                        <td>{{ $data->supplier->company }}</td>
                                        <td>Rp {{ number_format($data->cost,2) }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/product_supplier/' . $data->id . '/edit' ) }}"><i class="livicon"
                                                                                                            data-name="edit"
                                                                                                            data-size="18"
                                                                                                            data-loop="true"
                                                                                                            data-c="#428BCA"
                                                                                                            data-hc="#428BCA"
                                                                                                            title="@lang('product_supplier/table.update-data')"></i></a>
                                            <a href="{{ URL::to('admin/product_supplier/delete', $data->id) }}" ><i class="livicon" data-name="remove-alt"
                                                                                data-size="18" data-loop="true" data-c="#f56954"
                                                                                data-hc="#f56954"
                                                                                title="@lang('product_supplier/table.delete-data')"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
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
