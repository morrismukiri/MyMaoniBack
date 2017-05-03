<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Opentime Field -->
<div class="form-group col-sm-6 dateTimePicker">
    {!! Form::label('openTime', 'Opening time:') !!}
    <div class="input-group dateTimePicker">
        {!! Form::text('openTime', null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
    </div>
</div>

<!-- Closetime Field -->
<div class="form-group col-sm-6 dateTimePicker">
    {!! Form::label('closeTime', 'Closing time:') !!}
    <div class="input-group dateTimePicker">
        {!! Form::text('closeTime', null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
    </div>
</div>

<!-- Targetgroup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('targetGroup', 'Targetgroup:') !!}
    {!! Form::select('targetGroup', ['1' => 'All', '2' => 'Male', '3 ' => 'Female ', '4 ' => 'Youth'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('surveys.index') !!}" class="btn btn-default">Cancel</a>
</div>
