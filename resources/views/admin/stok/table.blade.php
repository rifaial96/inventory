<table class="table table-responsive table-striped table-bordered" id="not-table" width="100%">
    <thead>
     <tr>
        <th>No</th>
        <th>Name</th>
        <th>Code</th>
        <th>Category</th>
        <th>Price</th>
        <th>Supplier</th>
        <th>Cost</th>
        <th>Quantity</th>
     </tr>
    </thead>
    <tbody>
    @php $no=1; @endphp
    @foreach($stok as $data)
        <tr>
            <td>{!! $no !!}</td>
            <td>{!! $data->name !!}</td>
            <td>{!! $data->code !!}</td>
            <td>{!! $data->category !!}</td>
            <td>Rp.{!! number_format($data->price) !!}</td>
            <td>{!! $data->company !!}</td>
            <td>Rp.{!! number_format($data->cost) !!}</td>
            <td>{!! $data->quantity !!}</td>
           
        </tr>
        @php $no++ @endphp
    @endforeach
    </tbody>
</table>
@section('footer_scripts')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}">
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

    <script>
        $('#not-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#not-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );

       </script>

@stop