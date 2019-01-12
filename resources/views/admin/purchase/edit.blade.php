@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('purchase/title.edit')
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
        <h1>@lang('purchase/title.edit')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('purchase/title.purchase')</a>
            </li>
            <li class="active">@lang('purchase/title.edit')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                {!! Form::model($purchase, ['url' => URL::to('admin/purchase/' . $purchase->id), 'method' => 'put', 'class' => 'bf']) !!}
                <div class="row">
                    <div class="col-sm-8">
                    <div class="form-group {{ $errors->first('customer_id', 'has-error') }}">
                    <div class="form-group {{ $errors->first('supplier_id', 'has-error') }}">
                            <label for="supplier_id" class="">Supplier</label>
                            {{--{!! Form::label('supplier_id', trans('purchase/form.ll-postsupplier')) !!}--}}
                            {!! Form::select('supplier_id',$supplier ,null, array('class' => 'form-control select2', 'id'=>'company' ,'placeholder'=>trans('purchase/form.ph-supplier'))) !!}
                            <span class="help-block">{{ $errors->first('supplier_id', ':message') }}</span>
                        </div>

                        <label for="note" class="">Note</label>
                        <div class='box-body pad form-group {{ $errors->first('note', 'has-error') }}'>
                            {!! Form::textarea('note', NULL, array('placeholder'=>trans('purchase/form.ph-note'),'rows'=>'5','class'=>'textarea form-control','style'=>'style="width: 100%; height: 200px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            <span class="help-block">{{ $errors->first('note', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('status', 'has-error') }}">
                            <label for="status" class="">Status</label>
                            {!! Form::select('status',['Pending'=>'Pending','Ordered'=>'Ordered'], null, array('class' => 'form-control select2', 'id'=>'status' ,'placeholder'=>trans('purchase/form.ph-status'))) !!}
                            <span class="help-block">{{ $errors->first('status', ':message') }}</span>
                        </div>

                        <label>Down Payment (DP)</label>
                        <div class="form-group {{ $errors->first('down_payment', 'has-error') }}">
                            {!! Form::text('down_payment', null, array('class' => 'form-control input-lg','placeholder'=> trans('purchase/form.ph-down_payment'))) !!}
                            <span class="help-block">{{ $errors->first('down_payment', ':message') }}</span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success blog_submit">@lang('purchase/form.update')</button>
                            <a href="{{ URL::to('admin/purchase') }}" class="btn btn-danger">@lang('purchase/form.cancel')</a>
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
