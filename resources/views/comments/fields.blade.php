<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userId', 'Userid:') !!}
    {!! Form::select('userId', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Surveyid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surveyId', 'Surveyid:') !!}
    {!! Form::select('surveyId', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comments.index') !!}" class="btn btn-default">Cancel</a>
</div>
