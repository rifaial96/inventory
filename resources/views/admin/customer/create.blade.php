@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('customer/title.add-customer') :: @parent
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
        <h1>@lang('customer/title.add-customer')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('customer/title.customer')</a>
            </li>
            <li class="active">@lang('customer/title.add-customer')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                <!-- errors -->
                {!! Form::open(array('url' => URL::to('admin/customer'), 'method' => 'post', 'class' => 'bf')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="row">
                    <div class="col-sm-8 ">
                        <label>Company</label>
                        <div class="form-group {{ $errors->first('company', 'has-error') }}">
                            {!! Form::text('company', null, array('class' => 'form-control input-lg','placeholder'=> trans('customer/form.ph-company'))) !!}
                            <span class="help-block">{{ $errors->first('company', ':message') }}</span>
                        </div>

                        <label>Name</label>
                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {!! Form::text('name', null, array('class' => 'form-control input-lg','placeholder'=> trans('customer/form.ph-name'))) !!}
                            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                        </div>

                        <label>Phone</label>
                        <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                            {!! Form::text('phone', null, array('class' => 'form-control input-lg','placeholder'=> trans('customer/form.ph-phone'))) !!}
                            <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                        </div>

                        <label>Address</label>
                        <div class="form-group {{ $errors->first('address', 'has-error') }}">
                            {!! Form::text('address', null, array('class' => 'form-control input-lg','placeholder'=> trans('customer/form.ph-address'))) !!}
                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>
                        </div>

                        <label>City</label>
                        <div class="form-group {{ $errors->first('city', 'has-error') }}">
                            {!! Form::text('city', null, array('class' => 'form-control input-lg','placeholder'=> trans('customer/form.ph-city'))) !!}
                            <span class="help-block">{{ $errors->first('city', ':message') }}</span>
                        </div>

                        <label>State</label>
                        <div class="form-group {{ $errors->first('state', 'has-error') }}">
                            {!! Form::text('state', null, array('class' => 'form-control input-lg','placeholder'=> trans('customer/form.ph-state'))) !!}
                            <span class="help-block">{{ $errors->first('state', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('member_type', 'has-error') }}">
                            <label for="member_type" class="">Member Type</label>
                            {!! Form::select('member_type',['Gold'=>'Gold','Silver'=>'Silver'], null, array('class' => 'form-control select2', 'id'=>'member_type' ,'placeholder'=>trans('customer/form.select-member_type'))) !!}
                            <span class="help-block">{{ $errors->first('member_type', ':message') }}</span>
                        </div>

                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-12">

                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success">@lang('customer/form.save')</button>
                            <a href="{!! URL::to('admin/customer/create') !!}"
                               class="btn btn-danger">@lang('customer/form.cancel')</a>
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
