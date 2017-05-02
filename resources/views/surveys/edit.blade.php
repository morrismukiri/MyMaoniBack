@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Survey
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($survey, ['route' => ['surveys.update', $survey->id], 'method' => 'patch']) !!}

                        @include('surveys.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection