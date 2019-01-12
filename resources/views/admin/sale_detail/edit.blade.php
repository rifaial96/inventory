@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('sale_detail/title.edit')
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
        <h1>@lang('sale_detail/title.edit')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('sale_detail/title.sale_detail')</a>
            </li>
            <li class="active">@lang('sale_detail/title.edit')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                {!! Form::model($sale_detail, ['url' => URL::to('admin/sale_detail/' . $sale_detail->id), 'method' => 'put', 'class' => 'bf']) !!}
                <input type="hidden" name="sale_id" value="{{ $sale_detail->sale_id }}"/>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->first('product_id', 'has-error') }}">
                            <label for="product_id" class="">Product</label>
                            {{--{!! Form::label('product_id', trans('sale_detail/form.ll-postproduct')) !!}--}}
                            {!! Form::select('product_id',$product ,null, array('class' => 'form-control select2', 'id'=>'product' ,'placeholder'=>trans('sale_detail/form.ph-product'))) !!}
                            <span class="help-block">{{ $errors->first('product_id', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('supplier_id', 'has-error') }}">
                            <label for="supplier_id" class="">Supplier</label>
                            {{--{!! Form::label('supplier_id', trans('sale_detail/form.ll-postsupplier')) !!}--}}
                             <select id="supplier" name='supplier_id' class="form-control select2">
                            <option value="">Select product first</option>
                            </select>
                            <span class="help-block">{{ $errors->first('supplier_id', ':message') }}</span>
                        </div>

                        <label>Quantity</label>
                        <div class="form-group {{ $errors->first('quantity', 'has-error') }}">
                            {!! Form::text('quantity', null, array('class' => 'form-control input-lg','placeholder'=> trans('sale_detail/form.ph-quantity'))) !!}
                            <span class="help-block">{{ $errors->first('quantity', ':message') }}</span>
                        </div>                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-success blog_submit">@lang('sale_detail/form.update')</button>
                            <a href="{{ URL::to('admin/product/'.$sale_detail->product_id) }}" class="btn btn-danger">@lang('sale_detail/form.cancel')</a>
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
    <script>
    $('#product').on('change', function(e){
        console.log(e);
        var product_id = e.target.value;

        $.get('{{ url('sale_detail') }}/create/ajax-state?product_id=' + product_id, function(data) {
            console.log(data);
            $('#supplier').empty();
            $.each(data, function(index, subcatObj){
           $('#supplier').append('<option value="'+subcatObj.id+'">'+subcatObj.company+'</option>')

               });

            console.log(data);


        });
    });
</script>
@stop
