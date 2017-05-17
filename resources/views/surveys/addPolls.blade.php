@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Survey: {{ $survey->title }}
        </h1>

    </section>
    <div class="content">

        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <h3>Polls
                    <div class="pull-right">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                           href="{!! url('polls/create/'.$survey->id) !!}">Add New Poll</a>
                    </div>
                </h3>
                {{--<div class="clearfix"></div>--}}
                <hr>
                <div class="list-group">
                    @foreach($survey->polls as $poll)

                        <div class="list-group-item">
                            <h3 class="list-group-item-heading">
                                {{$poll->title}}
                                {!! Form::open(['route' => ['polls.destroy', $poll->id], 'method' => 'delete','class'=>'pull-right']) !!}


                                <div class='btn-group'>
                                    <a href="{!! route('polls.show', [$poll->id]) !!}" class='btn btn-default '
                                       title="View"><i class="glyphicon glyphicon-tasks"></i></a>
                                    <a href="{!! route('polls.show', [$poll->id]) !!}" class='btn btn-default '
                                       title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('polls.edit', [$poll->id]) !!}" class='btn btn-default '
                                       title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger ', 'title'=>'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </h3>


                            <div class="list-group-item-text">
                                <ul class=" list-group">
                                    @foreach($poll->answers as $answer)
                                        <li class="list-group-item ">{{ $answer->text }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
