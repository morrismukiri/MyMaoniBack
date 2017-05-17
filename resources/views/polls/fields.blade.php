<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
{{--<div class="form-group col-sm-12 col-lg-12">--}}
    {{--{!! Form::label('description', 'Description:') !!}--}}
    {{--{!! Form::textarea('description', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Parentid Field -->
<div class="form-group col-sm-12">
    {!! Form::label('surveyId', 'Survey:') !!}
    {!! Form::select('surveyId', $survies, null, ['class' => 'form-control']) !!}
</div>

<!-- SurveyId Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoryId', 'Category:') !!}
    {!! Form::select('categoryId', $categories, null, ['class' => 'form-control']) !!}
</div>
<!-- Opentime Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('openTime', 'Opening time:') !!}--}}
    {{--<div class="input-group dateTimePicker">--}}
        {{--{!! Form::text('openTime', null, ['class' => 'form-control']) !!}--}}
        {{--<div class="input-group-addon">--}}
            {{--<span class="glyphicon glyphicon-calendar"></span>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}

<!-- Closetime Field -->
{{--<div class="form-group col-sm-6 ">--}}
    {{--{!! Form::label('closeTime', 'Closing time:') !!}--}}
    {{--<div class="input-group dateTimePicker">--}}
        {{--{!! Form::text('closeTime', null, ['class' => 'form-control']) !!}--}}
        {{--<div class="input-group-addon">--}}
            {{--<span class="glyphicon glyphicon-calendar"></span>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- Targetgroup Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('targetGroup', 'Target group:') !!}--}}
    {{--{!! Form::select('targetGroup', ['0'=>'All','1' => 'Male', '2' => 'Female', '3 ' => 'Youth '], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {{--<label class="radio-inline">--}}
        {!! Form::select('type', ["closed"=>"closed","open"=>"open"], null,['class' => 'form-control']) !!}
    {{--</label>--}}

    {{--<label class="radio-inline">--}}
        {{--{!! Form::radio('type', "closed", null) !!} closed--}}
    {{--</label>--}}

</div>

{{--<!-- Userid Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('userId', 'Userid:') !!}--}}
{{--{!! Form::select('userId', ], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('polls.index') !!}" class="btn btn-default">Cancel</a>
</div>
