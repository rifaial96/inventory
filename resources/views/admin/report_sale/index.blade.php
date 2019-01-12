@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('sale/title.salelist')
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('assets/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css"/>
     <style type="text/css">
        .float{
            float: left;
        }
        #date{
            max-width: 15%; 
        }#date2{
            max-width: 15%;
        
        }
    </style>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>@lang('sale/title.salelist')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16"
                                                             data-color="#000"></i>
                    @lang('general.dashboard')
                </a>
            </li>
            <li><a href="#">@lang('sale/title.sale')</a></li>
            <li class="active">@lang('sale/title.salelist')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                                                         data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('report_sale/title.reportsalelist')
                    </h4>
                    <!-- <div class="pull-right">
                        <a href="{{ URL::to('admin/sale/create') }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div> -->
                </div>
                <br/>
                <div class="panel-body">
                    @php $start=''; $end='' @endphp
                    @if(!empty($request))
                     @php $start=$request->date; $end=$request->date2; @endphp
                     @endif 
                    <form action="{{url('admin/report_sale/search')}}" method='GET'>
                             {{csrf_field()}}
                              <input type="text" name="date" id="date" value="{{$start}}" required readonly placeholder="yyyy-mm-dd" class="form-control float">
                               <input type="text" name="date2" id="date2" value="{{$end}}" required readonly placeholder="yyyy-mm-dd" class="form-control float">
                            {!! Form::button('Filter',array('type'=>'submit','class'=>'btn btn-warning float')) !!}
                            </form>
                     <a href="{!! URL::to('admin/report_sale/') !!}" class="btn btn-success">Refresh</a>

                    <div class="table-responsive">
                          
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr class="filters">
                                <th align="center">@lang('sale/table.customer')</th>
                                <th align="center">@lang('sale/table.status')</th>
                                <th align="center">@lang('sale/table.payment_status')</th>
                                <th align="center">Laba</th>
                                <th align="center">@lang('report_sale/table.created_at')</th>
                                <th align="center" style="width: 70px">@lang('sale/table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(!empty($sale))
                                @foreach ($sale as $data)
                                 @php $laba=0 @endphp
                                  @foreach($sale_detail as $data1)
                                   @php $discount = 0 @endphp
                                        @if ($data->customer->member_type == "Gold") @php $discount = $data1->product->price * 0.3 @endphp @endif
                                        @if ($data->customer->member_type == "Silver") @php $discount = $data1->product->price * ($data1->product->category->discount / 100 ) @endphp @endif                

                                    @foreach($product_supplier as $data2)
                                         @foreach($product as $data3)

                                         @if($data->id == $data1->sale_id)
                                           @if($data1->product_id == $data2->product_id && $data1->supplier_id == $data2->supplier_id && $data1->product_id ==$data3->id)
                                          @php  $laba=$laba +(($data1->quantity * $data3->price)-($data1->quantity * $data2->cost)-$discount) @endphp
                                           @endif
                                        @endif
                                        @endforeach
                                    @endforeach
                                  @endforeach

                                  
                                    <tr>
                                        <td>{{ $data->customer->name }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->payment_status }}</td>
                                        
                                        <td align="right">Rp {{ number_format($laba, 2) }}</td>
                                        <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                        <td>                                       
                                        <a href="{{ URL::to('admin/report_sale/' . $data->id ) }}"><i class="livicon" data-name="info" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="@lang('sale/table.detail-sale')"></i></a</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
     <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>


    <script>
        $(document).ready(function(){
        $('#table').DataTable();
    });
            table.on('draw', function () {
                $('.livicon').each(function () {
                    $(this).updateLivicon();
                });
            });
        });

    </script>

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
    <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.panel-body form').length>0 ? $('.panel-body form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
 <script>
    $(document).ready(function(){
      var date_input=$('input[name="date2"]'); //our date input has the name "date"
      var container=$('.panel-body form').length>0 ? $('.panel-body form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
@stop
