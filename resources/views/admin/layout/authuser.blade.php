<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {{--<img src="{{ asset("/AdminLTE/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image">--}}
        <span class="hidden-xs">{{ $_user->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <img src="{{ asset("/pika/img/user/auth-user1.jpg") }}" class="img-circle" alt="User Image">
            <p>
                {{ $_user->name }}
                <small>{{ date('Y-m-d') }}</small>
            </p>
        </li>
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ route('user.personal') }}" class="btn btn-default btn-flat">个人资料</a>
            </div>
            <div class="pull-right">
                <a href="{{ route('login.out') }}" class="btn btn-default btn-flat">退出</a>
            </div>
        </li>
    </ul>
</li>