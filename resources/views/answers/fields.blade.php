<!-- Pollid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pollId', 'Poll:') !!}
    {!! Form::select('pollId',$polls, null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', 'Answer Text:') !!}
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('answers.index') !!}" class="btn btn-default">Cancel</a>
</div>
