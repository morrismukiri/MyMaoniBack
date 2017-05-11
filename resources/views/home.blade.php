@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-tasks"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Surveys</span>
                        <span class="info-box-number">10</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
    <span class="progress-description">
      70% Increase in 30 Days
    </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-comments"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Participation</span>
                        <span class="info-box-number">11 survey replies</span>
                        <!-- The progress section is optional -->
                        {{--<div class="progress">--}}
                        {{--<div class="progress-bar" style="width: 75%"></div>--}}
                        {{--</div>--}}
                        <span class="progress-description">
      75% Increase in 30 Days
    </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">11</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 99%"></div>
                        </div>
    <span class="progress-description">
      99% Increase in 30 Days
    </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">polls</span>
                        <span class="info-box-number">10</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

        </div>
    </div>
@endsection
