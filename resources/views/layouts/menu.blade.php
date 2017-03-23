<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('polls*') ? 'active' : '' }}">
    <a href="{!! route('polls.index') !!}"><i class="fa fa-edit"></i><span>Polls</span></a>
</li>

