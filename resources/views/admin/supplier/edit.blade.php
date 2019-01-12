@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('supplier/title.edit')
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>@lang('supplier/title.edit')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('supplier/title.supplier')</a>
            </li>
            <li class="active">@lang('supplier/title.edit')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                {!! Form::model($supplier, ['url' => URL::to('admin/supplier/' . $supplier->id), 'method' => 'put', 'class' => 'bf']) !!}
                <div class="row">
                    <div class="col-sm-8">
                        <label>Company</label>
                        <div class="form-group {{ $errors->first('company', 'has-error') }}">
                            {!! Form::text('company', null, array('class' => 'form-control input-lg','placeholder'=> trans('supplier/form.ph-company'))) !!}
                            <span class="help-block">{{ $errors->first('company', ':message') }}</span>
                        </div>

                        <label>Name</label>
                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {!! Form::text('name', null, array('class' => 'form-control input-lg','placeholder'=> trans('supplier/form.ph-name'))) !!}
                            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                        </div>

                        <label>Phone</label>
                        <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                            {!! Form::text('phone', null, array('class' => 'form-control input-lg','placeholder'=> trans('supplier/form.ph-phone'))) !!}
                            <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                        </div>

                        <label>Address</label>
                        <div class="form-group {{ $errors->first('address', 'has-error') }}">
                            {!! Form::text('address', null, array('class' => 'form-control input-lg','placeholder'=> trans('supplier/form.ph-address'))) !!}
                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>
                        </div>

                        <label>City</label>
                        <div class="form-group {{ $errors->first('city', 'has-error') }}">
                            {!! Form::text('city', null, array('class' => 'form-control input-lg','placeholder'=> trans('supplier/form.ph-city'))) !!}
                            <span class="help-block">{{ $errors->first('city', ':message') }}</span>
                        </div>

                        <label>State</label>
                        <div class="form-group {{ $errors->first('state', 'has-error') }}">
                            {!! Form::text('state', null, array('class' => 'form-control input-lg','placeholder'=> trans('supplier/form.ph-state'))) !!}
                            <span class="help-block">{{ $errors->first('state', ':message') }}</span>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success blog_submit">@lang('supplier/form.update')</button>
                            <a href="{{ URL::to('admin/supplier') }}" class="btn btn-danger">@lang('supplier/form.cancel')</a>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                <!-- /.row -->
                {!! Form::close() !!}
            </div>
        </div>
        <!--main content ends-->
    </section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/add_newblog.js') }}"></script>
@stop
