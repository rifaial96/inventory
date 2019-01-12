@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('purchase_detail/title.add-purchase_detail') :: @parent
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
        <h1>@lang('purchase_detail/title.add-purchase_detail')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('purchase_detail/title.purchase_detail')</a>
            </li>
            <li class="active">@lang('purchase_detail/title.add-purchase_detail')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                <!-- errors -->
                {!! Form::open(array('url' => URL::to('admin/purchase_detail'), 'method' => 'post', 'class' => 'bf')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="purchase_id" value="{{ $purchase_id }}"/>
                <div class="row">
                    <div class="col-sm-8 ">
                        <div class="form-group {{ $errors->first('product_id', 'has-error') }}">
                            <label for="product_id" class="">Product</label>
                            {{--{!! Form::label('product_id', trans('purchase_detail/form.ll-postproduct')) !!}--}}
                            {!! Form::select('product_id',$product ,null, array('class' => 'form-control select2', 'id'=>'name' ,'placeholder'=>trans('purchase_detail/form.ph-product'))) !!}
                            <span class="help-block">{{ $errors->first('product_id', ':message') }}</span>
                        </div>

                        <label>Product</label>
                        <div class="form-group {{ $errors->first('quantity', 'has-error') }}">
                            {!! Form::text('quantity', null, array('class' => 'form-control input-lg','placeholder'=> trans('purchase_detail/form.ph-quantity'))) !!}
                            <span class="help-block">{{ $errors->first('quantity', ':message') }}</span>
                        </div>                        

                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-12">

                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success">@lang('purchase_detail/form.save')</button>
                            <a href="{!! URL::to('admin/purchase/'.$purchase_id) !!}"
                               class="btn btn-danger">@lang('purchase_detail/form.cancel')</a>
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
