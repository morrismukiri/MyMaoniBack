<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $survey->title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $survey->description !!}</p>
</div>

<!-- Opentime Field -->
<div class="form-group">
    {!! Form::label('openTime', 'Opens:') !!}
    <p>{!! $survey->openTime !!}</p>
</div>

<!-- Closetime Field -->
<div class="form-group">
    {!! Form::label('closeTime', 'Closes:') !!}
    <p>{!! $survey->closeTime !!}</p>
</div>

{{--<!-- Targetgroup Field -->--}}
{{--<div class="form-group">--}}
    {{--{!! Form::label('targetGroup', 'Targetgroup:') !!}--}}
    {{--<p>{!! $survey->targetGroup !!}</p>--}}
{{--</div>--}}


<!-- Userid Field -->
<div class="form-group">
    {!! Form::label('userId', 'User:') !!}
    <p>{!! $survey->user->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $survey->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $survey->updated_at !!}</p>
</div>
<h2>Polls</h2>
<div class="list-group">
    @foreach($survey->polls as $poll)

        <div class="list-group-item">
            <h3 class="list-group-item-heading">
                {{$poll->title}}
                {!! Form::open(['route' => ['polls.destroy', $poll->id], 'method' => 'delete','class'=>'pull-right']) !!}


                <div class='btn-group'>
                    <a href="{!! route('polls.show', [$poll->id]) !!}" class='btn btn-default '
                       title="View"><i class="glyphicon glyphicon-tasks"></i></a>
                    <a href="{!! route('polls.show', [$poll->id]) !!}" class='btn btn-default '
                       title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('polls.edit', [$poll->id]) !!}" class='btn btn-default '
                       title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger ', 'title'=>'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </h3>


            <div class="list-group-item-text">
                <ul class=" list-group">
                    @foreach($poll->answers as $answer)
                        <li class="list-group-item ">{{ $answer->text }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endforeach


</div>

