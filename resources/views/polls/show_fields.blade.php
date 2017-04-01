<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $poll->title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $poll->description !!}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $poll->category?$poll->category->name:'None'!!}</p>
</div>

<!-- Opentime Field -->
<div class="form-group">
    {!! Form::label('openTime', 'Opening time:') !!}
    <p>{!! $poll->openTime !!}</p>
</div>

<!-- Closetime Field -->
<div class="form-group">
    {!! Form::label('closeTime', 'Closing time:') !!}
    <p>{!! $poll->closeTime !!}</p>
</div>

<!-- Targetgroup Field -->
<div class="form-group">
    {!! Form::label('targetGroup', 'Targetgroup:') !!}
    <p>{!! $poll->targetGroup !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $poll->type !!}</p>
</div>

<!-- Userid Field -->
<div class="form-group">
    {!! Form::label('userId', 'Posted by:') !!}
    <p>{!! $poll->user->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $poll->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $poll->updated_at !!}</p>
</div>

