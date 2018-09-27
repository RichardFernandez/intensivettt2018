@extends('layouts.backend')

@section('titulos')

      <h1>REGISTRO DE VIDEOS</h1>
     
@endsection     


@section('content')

   <div class="row justify-content-center">
   	<div class="col-6">
   		{{ Form::open(['route'=>'videos.store', 'method' => 'POST', 'files' => true]) }}
            <div class="form-group">
            	{{ Form::text('nombre_video', '',['class' => 'form-control', 'placeholder' => 'Nombre del video', 'required']) }}
            </div>
            <div class="form-group">
               {{ Form::textarea('url', '',['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Url del video', 'required']) }}
            </div>
            <div class="form-group">
            	{{ Form::select('categoria_id', $categorias, null,['class' => 'form-control', 'placeholder' => 'Selecciona la categoria', 'required']) }}
            </div>
            <div class="form-group">
            	{{ Form::file('imagen',['class' => 'form-control']) }}
            </div>
            <div class="form-group">
            	{{ Form::submit('Guardar registro',['class' => 'btn btn-success btn-guardar']) }}
               <a href="{{ route('videos.index') }}" class="btn-secondary">Cancelar</a>
            </div>
   		{{ Form::close() }}
   	</div>
   </div>

@endsection
