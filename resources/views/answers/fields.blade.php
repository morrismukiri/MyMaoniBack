<!-- Pollid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pollId', 'Pollid:') !!}
    {!! Form::select('pollId', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('answers.index') !!}" class="btn btn-default">Cancel</a>
</div>
