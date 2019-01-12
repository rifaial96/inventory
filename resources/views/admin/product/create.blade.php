@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('product/title.add-product') :: @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>@lang('product/title.add-product')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('product/title.product')</a>
            </li>
            <li class="active">@lang('product/title.add-product')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                <!-- errors -->
                {!! Form::open(array('url' => URL::to('admin/product'), 'method' => 'post', 'class' => 'bf')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="row">
                    <div class="col-sm-8 ">
                        <label>Product Name</label>
                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {!! Form::text('name', null, array('class' => 'form-control input-lg','placeholder'=> trans('product/form.ph-name'))) !!}
                            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                        </div>

                        <label>Product Code</label>
                        <div class="form-group {{ $errors->first('code', 'has-error') }}">
                            {!! Form::text('code', null, array('class' => 'form-control input-lg','placeholder'=> trans('product/form.ph-code'))) !!}
                            <span class="help-block">{{ $errors->first('code', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('category_id', 'has-error') }}">
                            <label for="category_id" class="">Category</label>
                            {{--{!! Form::label('category_id', trans('product/form.ll-postcategory')) !!}--}}
                            {!! Form::select('category_id',$category ,null, array('class' => 'form-control select2', 'id'=>'category' ,'placeholder'=>trans('product/form.ph-category'))) !!}
                            <span class="help-block">{{ $errors->first('category_id', ':message') }}</span>
                        </div>

                        <label>Price</label>
                        <div class="form-group {{ $errors->first('price', 'has-error') }}">
                            {!! Form::text('price', null, array('class' => 'form-control input-lg','placeholder'=> trans('product/form.ph-price'))) !!}
                            <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                        </div>

                        <label>Alert Quantity</label>
                        <div class="form-group {{ $errors->first('alert_quantity', 'has-error') }}">
                            {!! Form::text('alert_quantity', null, array('class' => 'form-control input-lg','placeholder'=> trans('product/form.ph-alert_quantity'))) !!}
                            <span class="help-block">{{ $errors->first('alert_quantity', ':message') }}</span>
                        </div>

                        <!--
                        <label>Warehouse Quantity</label>
                        <div class="form-group {{ $errors->first('warehouse_quantity', 'has-error') }}">
                            {!! Form::text('warehouse_quantity', null, array('class' => 'form-control input-lg','placeholder'=> trans('product/form.ph-warehouse_quantity'))) !!}
                            <span class="help-block">{{ $errors->first('warehouse_quantity', ':message') }}</span>
                        </div>
                        -->


                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-12">

                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success">@lang('product/form.save')</button>
                            <a href="{!! URL::to('admin/product/create') !!}"
                               class="btn btn-danger">@lang('product/form.cancel')</a>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!--main content ends-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
    <!--edit blog-->
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
@stop
