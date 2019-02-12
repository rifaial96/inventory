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

@foreach($purchase as $data1)

                <header style="text-align: center;"><img src="assets/img/logopdf.png"  alt="Logo"></header>        
            <div >
                <table  class="note">
                    <tr>
                        <td style="width: 50%;"><strong>Date : {!! $data1->created_at !!}</strong></td>
                          <td rowspan="2" align="right"> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($data1->id, 'C93')}}" alt="barcode" /> </td>
                        
                    </tr>
                    <tr><td><strong>Reference : PO/{!! $data1->created_at->format('Y')!!}/{!! $data1->created_at->format('m')!!}/{{$data1->id}}</strong></td>

                    </tr>
                </table>
                <table  border="0" style="margin-top: 10px">
                    <tr>
                        <td><strong> {!! $data1->supplier->company !!}</strong></td>
                        <td><strong> {!! $user->company !!}</strong></td>
                    </tr>
                    <tr>
                        <td>{!! $data1->supplier->address !!}</td>
                        <td>{!!  $user->address !!}   </td>
                    </tr>
                     <tr>
                        <td>Telp : {!! $data1->supplier->phone !!}</td>
                        <td>Telp : {!! $user->phone !!}</td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td>Email : {!! $user->email !!}</td>
                    </tr>
                </table>
                                   
            </div>
            
                <br/>
                        <table  class="tabe" style="margin-top: 20px">
                            <thead>
                            <tr class="tabe">
                                <th align="center" style="width: 7%;">NO</th>
                                <th align="center" style="width: 40%;">@lang('purchase_detail/table.product')</th>
                                <th align="center">@lang('purchase_detail/table.quantity')</th>
                                <th align="center">@lang('purchase_detail/table.price')</th>
                                <th align="center">@lang('purchase_detail/table.subtotal')</th>
                  
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($purchase_detail))
                                @php $grandtotal = 0 @endphp
                                @php $balance = 0 @endphp
                                @php $discounttot = 0 @endphp
                                @php $no = 1 @endphp

                                @foreach ($purchase_detail as $data)
                                    <tr>
                                    @php $discount = 0 @endphp
                                        @if ($data1->supplier->member_type == "Gold") @php $discount = $data->product->price * 0.3 @endphp @endif
                                        @if ($data1->supplier->member_type == "Silver") @php $discount = $data->product->price * ($data->product->category->discount / 100 ) @endphp @endif                                        
                                        <td align="center">{{$no}}</td>                          
                                        <td>{{ $data->product->code }} - {{ $data->product->name }}</td>
                                        <td align="center">{{ $data->quantity }}</td>
                                        <td align="right">Rp {{ number_format($data->product->price,2) }}</td>
                                        <td align="right">Rp {{ number_format(($data->product->price * $data->quantity) - $discount,2) }} @php $grandtotal = $grandtotal + (($data->product->price * $data->quantity) - $discount) @endphp </td>
                                        @php $discounttot += $discount   @endphp
                                    </tr>
                                    @php $no++ @endphp
                                @endforeach
                                @if ($data1->amount_paid > 0) @php $balance = $grandtotal - $data1->amount_paid @endphp @endif
                                    <tr>
                                        <td colspan="2" style="text-align:right" ><strong>Total </strong></td>
                                        <td >: </td>
                                        <td colspan="2" align="right">Rp {{ number_format($grandtotal,2) }}</td>
                                    </tr>
                                    @if ($data1->status == "Completed") 
                                    <tr>
                                        <td colspan="2" style="text-align:right"><strong>Paid </strong></td>
                                        <td >: </td>
                                        <td colspan="2" align="right"> 
                                        Rp {{ number_format($data1->amount_paid,2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:right"><strong>Balance </strong></td>
                                        <td >: </td>
                                        <td colspan="2" align="right"> 
                                        Rp {{ number_format($balance,2) }}
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="2" style="text-align:right"><strong>Paid </strong></td>
                                        <td >: </td>
                                        <td colspan="2"> 
                                            <div class="form-group {{ $errors->first('amount_paid', 'has-error') }}">
                                                <input name="amount_paid" value="{{ $data1->amount_paid }}" class="form-control input-lg" id="paid" onchange="Balance();"  placeholder="{{ trans('purchase_detail/form.ph-paid') }}"
                                                <span class="help-block">{{ $errors->first('amount_paid', ':message') }}</span>
                                            </div>                                                                                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:right"><strong>Balance </strong></td>
                                        <td >: </td>
                                        <td colspan="2"> 
                                            <div class="form-group {{ $errors->first('balance', 'has-error') }}">
                                            <input name="balance" value="{{ $balance }}" class="form-control input-lg" id="balance"  placeholder="{{ trans('purchase_detail/form.ph-balance') }}"
                                                <span class="help-block">{{ $errors->first('balance', ':message') }}</span>
                                            </div>                                                                                                        
                                        </td>
                                    </tr>
                                    @endif
                            
                            @endif
                            </tbody>
                        </table> 
                        <div class="note"><p><strong>NOTE :</strong> {!! $data1->note !!} </p></div>      
                        <table style="margin-top: 20px">
                            <tr>
                                <td></td>
                                <td style="width:40%">&nbsp;</td>
                                <td>Ordered by : {!! $user->first_name !!} {!! $user->last_name !!}</td>
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
                                <td></td>
                                <td></td>
                                <td><hr></td>
                            </tr>
                            <tr>
                                <td></td>
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
