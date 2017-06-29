<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $comments->id !!}</p>
</div>

<!-- Userid Field -->
<div class="form-group">
    {!! Form::label('userId', 'Userid:') !!}
    <p>{!! $comments->userId !!}</p>
</div>

<!-- Surveyid Field -->
<div class="form-group">
    {!! Form::label('surveyId', 'Surveyid:') !!}
    <p>{!! $comments->surveyId !!}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{!! $comments->comment !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $comments->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $comments->updated_at !!}</p>
</div>

