@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('product_supplier/title.add-product_supplier') :: @parent
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
        <h1>@lang('product_supplier/title.add-product_supplier')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('product_supplier/title.product_supplier')</a>
            </li>
            <li class="active">@lang('product_supplier/title.add-product_supplier')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                <!-- errors -->
                {!! Form::open(array('url' => URL::to('admin/product_supplier'), 'method' => 'post', 'class' => 'bf')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="product_id" value="{{ $product_id }}"/>
                <div class="row">
                    <div class="col-sm-8 ">
                        <div class="form-group {{ $errors->first('supplier_id', 'has-error') }}">
                            <label for="supplier_id" class="">Supplier</label>
                            {{--{!! Form::label('supplier_id', trans('product_supplier/form.ll-postsupplier')) !!}--}}
                            {!! Form::select('supplier_id',$supplier ,null, array('class' => 'form-control select2', 'id'=>'supplier' ,'placeholder'=>trans('product_supplier/form.ph-supplier'))) !!}
                            <span class="help-block">{{ $errors->first('supplier_id', ':message') }}</span>
                        </div>

                        <label>Cost</label>
                        <div class="form-group {{ $errors->first('cost', 'has-error') }}">
                            {!! Form::text('cost', null, array('class' => 'form-control input-lg','placeholder'=> trans('product_supplier/form.ph-cost'))) !!}
                            <span class="help-block">{{ $errors->first('cost', ':message') }}</span>
                        </div>                        

                        <label>Quantity</label>
                        <div class="form-group {{ $errors->first('quantity', 'has-error') }}">
                            {!! Form::text('quantity', null, array('class' => 'form-control input-lg','placeholder'=> trans('product_supplier/form.ph-quantity'))) !!}
                            <span class="help-block">{{ $errors->first('quantity', ':message') }}</span>
                        </div>


                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-12">

                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success">@lang('product_supplier/form.save')</button>
                            <a href="{!! URL::to('admin/product/'.$product_id) !!}"
                               class="btn btn-danger">@lang('product_supplier/form.cancel')</a>
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
