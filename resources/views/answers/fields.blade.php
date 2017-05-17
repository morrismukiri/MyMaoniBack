
<!-- Pollid Field -->
<div class="form-group col-sm-12">
    {!! Form::label('pollId', 'Poll:') !!}
    {!! Form::select('pollId',$polls, null, ['class' => 'form-control']) !!}
</div>

<div class="col-sm-12">
    @if(isset($answers))
        <h4>Current Answers</h4>
    <ol style="list-style-type: upper-alpha;">
        @foreach($answers as $answer)
            <li class="">{{ $answer->text }}</li>
        @endforeach
    </ol>
    @endif
</div>
<!-- Text Field -->
<div class="form-group col-sm-12">
    {!! Form::label('text', 'New Answer Value:') !!}
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('poll/'.$poll->id.'/answers') !!}" class="btn btn-default">Cancel</a>
</div>
