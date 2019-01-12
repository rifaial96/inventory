<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
    body{
        width: 100%;
    }
    div.gallery {
        margin-bottom:10px;
        margin-left: 20px;
        float: left;
        width: 120px;
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        text-align: center;
       ;
    }
    table{
        width:100%;
        text-align:center;
        padding:20px;
        font-size: 14px;
        padding:0;

    }
    
   
    </style>
</head>
        <body>
        <div class="table-responsive">
                        <table border='1' cellspacing='0'>
                            <thead>
                            <tr class="filters">
                                <th>@lang('purchase_detail/table.product')</th>
                                <th>@lang('purchase_detail/table.quantity')</th>
                                <th>@lang('purchase_detail/table.price')</th>
                                <th>@lang('purchase_detail/table.subtotal')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($purchase_detail))
                            @php $grandtotal = 0 @endphp                            
                                @foreach ($purchase_detail as $data)
                                    <tr>
                                        <td>{{ $data->product->name }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>Rp {{ number_format($data->product->price,2) }}</td>
                                        <td>Rp {{ number_format($data->product->price * $data->quantity,2) }} @php $grandtotal = $grandtotal + (($data->product->price * $data->quantity)) @endphp</td>
                                    </tr>
                                @endforeach
                                <tr>
                                        <td colspan="2" >Total </td>
                                        <td >: </td>
                                        <td colspan="2">Rp {{ number_format($grandtotal,2) }}</td>
                                    </tr>

                            @endif
                            </tbody>
                        </table>                    
                    </div>
              </body>
    </head>
</html>