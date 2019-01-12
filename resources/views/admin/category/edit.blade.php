@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('category/title.edit')
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
        <h1>@lang('category/title.edit')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('category/title.category')</a>
            </li>
            <li class="active">@lang('category/title.edit')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                {!! Form::model($category, ['url' => URL::to('admin/category/' . $category->id), 'method' => 'put', 'class' => 'bf']) !!}
                <div class="row">
                    <div class="col-sm-8">
                    <label>Category</label>
                        <div class="form-group {{ $errors->first('category', 'has-error') }}">
                            {!! Form::text('category', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('category', ':message') }}</span>
                        </div>

                    <label>Discount</label>
                        <div class="form-group {{ $errors->first('discount', 'has-error') }}">
                            {!! Form::text('discount', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('blog/form.ph-discount'))) !!}
                            <span class="help-block">{{ $errors->first('discount', ':message') }}</span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success blog_submit">@lang('category/form.update')</button>
                            <a href="{{ URL::to('admin/category') }}" class="btn btn-danger">@lang('category/form.cancel')</a>
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
