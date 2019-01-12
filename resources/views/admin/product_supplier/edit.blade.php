@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('product/title.edit')
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
        <h1>@lang('product/title.edit')</h1>
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
            <li class="active">@lang('product/title.edit')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                {!! Form::model($product_supplier, ['url' => URL::to('admin/product_supplier/' . $product_supplier->id), 'method' => 'put', 'class' => 'bf']) !!}
                <input type="hidden" name="product_id" value="{{ $product_supplier->product_id }}"/>
                <div class="row">
                    <div class="col-sm-8">
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-success blog_submit">@lang('product_supplier/form.update')</button>
                            <a href="{{ URL::to('admin/product/'.$product_supplier->product_id) }}" class="btn btn-danger">@lang('product_supplier/form.cancel')</a>
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
