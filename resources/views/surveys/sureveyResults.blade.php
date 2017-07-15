{{--{{ dd(json_encode($survey->votes) )}}--}}
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
                <h3>Results
                </h3>
                {{--<div class="clearfix"></div>--}}
                <hr>
                <div class="list-group">
                    @foreach($survey->polls as $poll)

                        <div class="list-group-item">
                            <h3 class="list-group-item-heading">
                                {{$poll->title}}
                            </h3>

                            <table>
                                <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>Votes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($poll->answers as $answer)
                                    <tr>
                                        <td>{{ $answer->text }}</td>
                                        <td> <strong>{{ $poll->votes->where('answerId',$answer->id)->count() }}</strong>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                </div>
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
