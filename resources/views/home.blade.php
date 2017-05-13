@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>
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


        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Don't show</a></li>

                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Survey contribution</strong>
                                </p>

                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>

                                {{--<div class="progress-group">--}}
                                    {{--<span class="progress-text">Add Products to Cart</span>--}}
                                    {{--<span class="progress-number"><b>160</b>/200</span>--}}

                                    {{--<div class="progress sm">--}}
                                        {{--<div class="progress-bar progress-bar-aqua" style="width: 80%"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.progress-group -->--}}
                                {{--<div class="progress-group">--}}
                                    {{--<span class="progress-text">Complete Purchase</span>--}}
                                    {{--<span class="progress-number"><b>310</b>/400</span>--}}

                                    {{--<div class="progress sm">--}}
                                        {{--<div class="progress-bar progress-bar-red" style="width: 80%"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.progress-group -->--}}
                                {{--<div class="progress-group">--}}
                                    {{--<span class="progress-text">Visit Premium Page</span>--}}
                                    {{--<span class="progress-number"><b>480</b>/800</span>--}}

                                    {{--<div class="progress sm">--}}
                                        {{--<div class="progress-bar progress-bar-green" style="width: 80%"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.progress-group -->--}}
                                {{--<div class="progress-group">--}}
                                    {{--<span class="progress-text">Send Inquiries</span>--}}
                                    {{--<span class="progress-number"><b>250</b>/500</span>--}}

                                    {{--<div class="progress sm">--}}
                                        {{--<div class="progress-bar progress-bar-yellow" style="width: 80%"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
