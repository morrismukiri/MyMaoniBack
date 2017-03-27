<!-- User Field -->
<div class="form-group">
    {!! Form::label('userId', 'User:') !!}
    <p>{!! $opinion->user->name !!}</p>
</div>

<!-- Pollid Field -->
<div class="form-group">
    {!! Form::label('pollId', 'Poll Title:') !!}
    <p>{!! $opinion->poll->title !!}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{!! $opinion->comment !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $opinion->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $opinion->updated_at !!}</p>
</div>

