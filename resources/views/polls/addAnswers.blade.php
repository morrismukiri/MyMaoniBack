@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Poll: {{ $poll->title }}
        </h1>

    </section>
    <div class="content">

        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <h3>Answers
                    <div class="pull-right">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                           href="{!! route('answers.create') !!}">Add New Answer</a>
                    </div>
                </h3>
                {{--<div class="clearfix"></div>--}}
                <hr>
                <div class="list-group">
                    @foreach($poll->answers as $answer)

                        <div class="list-group-item">

                                {{$answer->text}}
                                {!! Form::open(['route' => ['answers.destroy', $answer->id], 'method' => 'delete','class'=>'pull-right']) !!}


                                <div class='btn-group'>
                                    <a href="{!! route('answers.show', [$answer->id]) !!}" class='btn btn-default '
                                       title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('answers.edit', [$answer->id]) !!}" class='btn btn-default '
                                       title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger ', 'title'=>'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}

                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
