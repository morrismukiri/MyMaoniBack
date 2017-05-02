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
<div class="form-group col-sm-6">
    {!! Form::label('openTime', 'Opentime:') !!}
    {!! Form::date('openTime', null, ['class' => 'form-control']) !!}
</div>

<!-- Closetime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('closeTime', 'Closetime:') !!}
    {!! Form::date('closeTime', null, ['class' => 'form-control']) !!}
</div>

<!-- Targetgroup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('targetGroup', 'Targetgroup:') !!}
    {!! Form::select('targetGroup', ['1' => 'All', '2' => 'Male', '3 ' => 'Female ', '4 ' => 'Youth'], null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ["closed"=>"closed","open"=>"open"], null,['class' => 'form-control']) !!}

</div>

<!-- Userid Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('userId', 'Userid:') !!}--}}
    {{--{!! Form::select('userId', ], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('surveys.index') !!}" class="btn btn-default">Cancel</a>
</div>
