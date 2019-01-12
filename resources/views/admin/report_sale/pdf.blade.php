<head>
    <style type="text/css">
        table{
            width: 100%;
        }
        .tabe{
             border-collapse: collapse;
    border: 1px solid black;
        }
        .note{
            background-color: #dcdfe5;
        }

    </style>
</head>

@foreach($sale as $data1)

                <header style="text-align: center;"><img src="assets/img/logopdf.png"  alt="Logo"   ></header>        
            <div >
                <table  border="0">
                    <tr>
                        <td style="width: 50%;">To :</td>
                        <td>From :</td>
                    </tr>
                    <tr>
                        <td><strong> {!! $data1->customer->company !!}   </strong></td>
                        <td><strong> {!! $user->company !!}</strong></td>
                    </tr>
                    <tr>
                        <td>{!! $data1->customer->address !!}</td>
                        <td>{!! $user->address !!}  </td>
                    </tr>
                     <tr>
                        <td>Telp : {!! $data1->customer->phone !!}</td>
                        <td>Telp : {!! $user->phone!!}</td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td>Email : {!! $user->email !!}</td>
                    </tr>
                     <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                     <tr>
                        <td><strong>{!! $user->company !!}</strong></td>
                        <td>Date : {!! $data1->created_at !!}</td>
                    <tr>
                        <td>{!! $user->address !!} </td>
                        <td>Reference : SALE/{!! $data1->created_at->format('Y')!!}/{!! $data1->created_at->format('m')!!}/{{$data1->id}} </td>
                    </tr>
                </table>
                <table border="0">
                    <tr>
                        <td style="width: 50%;">Telp : {!! $user->phone !!}</td>
                        <td rowspan="2"> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($data1->id, 'C93')}}" alt="barcode" /> </td>
                    </tr>
                     <tr>
                        <td>Email : {!! $user->email !!}</td>
                        
                    </tr>
                </table>
                                   
            </div>
            
                <br/>
                        <table  class="tabe">
                            <thead>
                            <tr class="tabe">
                                <th align="center" style="width: 7%;">NO</th>
                                <th align="center" style="width: 40%;">@lang('sale_detail/table.product')</th>
                                  <th align="center">@lang('sale_detail/table.discount')</th>
                                <th align="center">@lang('sale_detail/table.quantity')</th>
                                <th align="center">@lang('sale_detail/table.price')</th>
                                <th align="center">@lang('sale_detail/table.subtotal')</th>
                  
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($sale_detail))
                                @php $grandtotal = 0 @endphp
                                @php $balance = 0 @endphp
                                @php $discounttot = 0 @endphp
                                @php $no = 1 @endphp

                                @foreach ($sale_detail as $data)
                                    <tr>
                                    @php $discount = 0 @endphp
                                         @php $disc=0 @endphp
                                        @if ($data1->customer->member_type == "Gold") @php $discount = $data->product->price * 0.3; $disc=30 @endphp @endif
                                        @if ($data1->customer->member_type == "Silver") @php $discount = $data->product->price * ($data->product->category->discount / 100 );$disc=$data->product->category->discount @endphp @endif      
                                        <td align="center">{{$no}}</td>                          
                                        <td>{{ $data->product->code }} - {{ $data->product->name }}</td>
                                         <td align="center">{{ $disc }}%</td>
                                        <td align="center">{{ $data->quantity }}</td>
                                        <td align="right"> {{ number_format($data->product->price,2) }}</td>
                                        <td align="right"> {{ number_format(($data->product->price * $data->quantity) - $discount,2) }} @php $grandtotal = $grandtotal + (($data->product->price * $data->quantity) - $discount) @endphp </td>
                                        @php $discounttot += $discount   @endphp
                                    </tr>
                                    @php $no++ @endphp
                                @endforeach
                                @if ($data1->amount_paid > 0) @php $balance = $grandtotal - $data1->amount_paid @endphp @endif
                                    <tr>
                                        <td colspan="3" style="text-align:right" ><strong>Total(Rp)</strong></td>
                                        <td >: </td>
                                        <td colspan="2" align="right"><strong> {{ number_format($grandtotal,2) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"  style="text-align:right"><strong>Discount(Rp)</strong></td>
                                        <td >: </td>
                                        <td colspan="2" align="right">( {{ number_format($discounttot,2) }})</td>
                                    </tr>
                               
                                    <tr>
                                        <td colspan="3" style="text-align:right"><strong>Paid(Rp)</strong></td>
                                        <td >: </td>
                                        <td colspan="2" align="right"> 
                                         {{ number_format($data1->amount_paid,2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align:right"><strong>Balance(Rp)</strong></td>
                                        <td >: </td>
                                        <td colspan="2" align="right"> 
                                         {{ number_format($balance,2) }}
                                        </td>
                                    </tr>
                            
                            @endif
                            </tbody>
                        </table> 
                        <div class="note"><p><strong>NOTE :</strong> {!! $data1->note !!} </p></div>      
                        <table style="margin-top: 20px">
                            <tr>
                                <td>Seller : {!! $user->company !!}</td>
                                <td style="width:40%">&nbsp;</td>
                                <td>Customer : {!! $data1->customer->company !!}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><hr></td>
                                <td></td>
                                <td><hr></td>
                            </tr>
                            <tr>
                                <td>Stamp & Signature</td>
                                <td></td>
                                <td>Stamp & Signature</td>
                            </tr>
                        </table>             
            
@endforeach

    <script>

        function Balance()
        {
            var total = document.getElementById("total").value;
            var paid = document.getElementById("paid").value;
            var balance = total - paid;
            document.getElementById("balance").value = balance;
        }        

    </script>
