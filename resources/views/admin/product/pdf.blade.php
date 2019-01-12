<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
    body{
        width: 100%;
    }
    div{
        width: 120px;
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


    }
    .kecil{
        font-size:10px;
    }
    .sedang{
        font-size:13px;
    }
    
    .besar{
        font-size:15px;
    }
    
    .tabbar{
        padding:10px;
        text-align:center;
        margin-top:50px;
        
    }
    
   
    </style>
</head>
        <body>
            <table class="tabbar" >
                @if($size=='sedang')
                  @php $co= 1; @endphp
                        @for ($a=1; $a <= $jml ; $a++)  
                            @if ($a == $co) {
                                <tr>
                            @endif
                                <td style='width: 130px;' class='sedang'>
                                <div><img src="assets/img/logopdf.png" height="20px" alt="Logo"></div>
                                <div>{{$product->name}}</div>
                                <div>PRICE {{$product->price}}</div>
                                <div><img width='120px' src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->code, 'C93')}}" alt="barcode" /> </div>
                                <div>{{$product->code}}</div>
                                </td>
                            @if ($a %5==0 || $a==$jml) 
                                @php $co = $co + 5 @endphp
                    
                                </tr>
                            @endif
                        @endfor  
                @elseif($size=='besar')
                @php $co= 1; @endphp
                        @for ($a=1; $a <= $jml ; $a++)  
                            @if ($a == $co) {
                                <tr>
                            @endif
                                <td style='width: 160px;' class='besar'>
                                <div><img src="assets/img/logopdf.png" height="25px" alt="Logo"></div>
                                <div>{{$product->name}}</div>
                                <div>PRICE {{$product->price}}</div>
                                <div><img width='150px' src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->code, 'C93')}}" alt="barcode" /> </div>
                                <div>{{$product->code}}</div>
                                </td>
                            @if ($a %4==0 || $a==$jml) 
                                @php $co = $co + 4 @endphp
                    
                                </tr>
                            @endif
                        @endfor  
                 @else   
                 @php $co= 1; @endphp
                        @for ($a=1; $a <= $jml ; $a++)  
                            @if ($a == $co) {
                                <tr>
                            @endif
                                <td style='width:95px;' class='kecil' >
                                <div><img src="assets/img/logopdf.png" height="15px" alt="Logo"></div>
                                <div>{{$product->name}}</div>
                                <div>PRICE {{$product->price}}</div>
                                <div><img width='90px' src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->code, 'C93')}}" alt="barcode" /> </div>
                                <div>{{$product->code}}</div>
                                </td>
                            @if ($a %6==0 || $a==$jml) 
                                @php $co = $co + 6 @endphp
                    
                                </tr>
                            @endif
                        @endfor  
                 @endif    
            </table>
        </body>
    </head>
</html>