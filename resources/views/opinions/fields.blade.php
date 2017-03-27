{{--<!-- Userid Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('userId', 'Userid:') !!}--}}
    {{--{!! Form::select('userId', ], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Pollid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pollId', 'Poll:') !!}
    {!! Form::select('pollId', $polls, Input::old('pollId'), ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('opinions.index') !!}" class="btn btn-default">Cancel</a>
</div>
