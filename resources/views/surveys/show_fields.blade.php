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

