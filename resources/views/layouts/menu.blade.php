
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! url('/home') !!}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li class="{{ Request::is('surveys*') ? 'active' : '' }}">
    <a href="{!! route('surveys.index') !!}"><i class="fa fa-edit"></i><span>Surveys</span></a>
</li>
<li class="{{ Request::is('polls*') ? 'active' : '' }}">
    <a href="{!! route('polls.index') !!}"><i class="fa fa-list-alt"></i><span>Polls</span></a>

</li>

{{--<li class="{{ Request::is('answers*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('answers.index') !!}"><i class="fa fa-edit"></i><span>Poll Answers</span></a>--}}
{{--</li>--}}

<li class="{{ Request::is('opinions*') ? 'active' : '' }}">
    <a href="{!! route('opinions.index') !!}"><i class="fa fa-comment"></i><span>Opinions</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-cogs"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
</li>


