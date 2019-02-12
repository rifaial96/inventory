<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f"
           data-hovercolor="#e9573f" data-size="28"></i>
        <span class="label label-warning">{{$stok}}</span>
    </a>
    <ul class=" notifications dropdown-menu drop_notify">
        <li class="dropdown-title">You have {{$stok}} notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach ($notif as $data)
                <li>
                    <i class="livicon danger" data-n="timer" data-s="20" data-c="white"
                       data-hc="white"></i>
                    <a href="#">{{$data->name}}</a>
                    <small class="pull-right">
                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                        Just Now
                    </small>
                </li>
               @endforeach
            </ul>
        </li>
        <li class="footer">
            <a href="{{url('notif')}}">View all</a>
        </li>
    </ul>
</li>