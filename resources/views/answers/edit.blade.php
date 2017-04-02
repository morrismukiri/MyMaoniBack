@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Answers
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($answers, ['route' => ['answers.update', $answers->id], 'method' => 'patch']) !!}

                        @include('answers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection