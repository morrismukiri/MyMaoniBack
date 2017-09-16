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
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
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
                                                <td>
                                                    <strong>{{ $poll->votes->where('answerId',$answer->id)->count() }}</strong>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <canvas id="poll_{{$poll->id}}" class="poll_result_graph" height="250"></canvas>
                                </div>
                            </div>
                        </div>

                </div>
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
                @foreach($survey->polls as $poll)
        var poll_{{$poll->id}}_data = [];
        var poll_{{$poll->id}}_label = [];
        @foreach($poll->answers as $answer)
poll_{{$poll->id}}_data.push({{ $poll->votes->where('answerId',$answer->id)->count() }});
        poll_{{$poll->id}}_label.push('{{ $answer->text }}');

        @endforeach
            data_{{$poll->id}}=
            {
                labels: poll_{{$poll->id}}_label,
                datasets: [{
                    label: '# of Votes',
                    data: poll_{{$poll->id}}_data,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }]
            }
        ;

        var poll_{{$poll->id}}_chart = new Chart(document.getElementById("poll_{{$poll->id}}"), {
            type: 'doughnut',
            data: data_{{$poll->id}}
        });
        @endforeach


    </script>
@endsection