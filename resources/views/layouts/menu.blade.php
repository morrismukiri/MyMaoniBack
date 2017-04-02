<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('polls*') ? 'active' : '' }}">
    <a href="{!! route('polls.index') !!}"><i class="fa fa-edit"></i><span>Polls</span></a>
</li>



<li class="{{ Request::is('opinions*') ? 'active' : '' }}">
    <a href="{!! route('opinions.index') !!}"><i class="fa fa-edit"></i><span>Opinions</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('answers*') ? 'active' : '' }}">
    <a href="{!! route('answers.index') !!}"><i class="fa fa-edit"></i><span>answers</span></a>
</li>

