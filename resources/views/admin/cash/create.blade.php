@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('cash/title.add-cash') :: @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
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
        <h1>@lang('cash/title.add-cash')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('cash/title.cash')</a>
            </li>
            <li class="active">@lang('cash/title.add-cash')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                <!-- errors -->
                {!! Form::open(array('url' => URL::to('admin/cash'), 'method' => 'post', 'class' => 'bf')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="row">
                    <div class="col-sm-8 ">
                        <label>Date</label>
                        <div class="form-group {{ $errors->first('date_flow', 'has-error') }}">
                            <div class="input-group-addon">
                                <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>                            
                            {!! Form::text('date_flow', null, array('class' => 'form-control input-lg', 'id' => 'datetime1', 'placeholder'=> trans('cash/form.ph-date'))) !!}</div>
                            <span class="help-block">{{ $errors->first('date_flow', ':message') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-8 ">
                        <label>Description</label>
                        <div class="form-group {{ $errors->first('description', 'has-error') }}">
                            {!! Form::text('description', null, array('class' => 'form-control input-lg','placeholder'=> trans('cash/form.ph-description'))) !!}
                            <span class="help-block">{{ $errors->first('description', ':message') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-8 ">
                        <label>Money</label>
                        <div class="form-group {{ $errors->first('money', 'has-error') }}">
                            {!! Form::text('money', null, array('class' => 'form-control input-lg','placeholder'=> trans('cash/form.ph-money'))) !!}
                            <span class="help-block">{{ $errors->first('money', ':message') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-8 ">
                        <div class="form-group {{ $errors->first('status', 'has-error') }}">
                            <label for="status" class="">Status</label>
                            {!! Form::select('status',['1'=>'Debet','0'=>'Credit'], null, array('class' => 'form-control select2', 'id'=>'status' ,'placeholder'=>trans('cash/form.ph-status'))) !!}
                            <span class="help-block">{{ $errors->first('status', ':message') }}</span>
                        </div>
                    </div>

                    <!-- /.col-sm-8 -->
                    <div class="col-sm-12">

                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success">@lang('cash/form.save')</button>
                            <a href="{!! URL::to('admin/cash/create') !!}"
                               class="btn btn-danger">@lang('cash/form.cancel')</a>
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
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>
@stop
