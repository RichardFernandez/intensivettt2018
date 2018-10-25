@extends('layouts.backend')

@section('titulos')

      <h1>EDICIÓN DE VIDEO</h1>
     
@endsection     


@section('content')

   <div class="row justify-content-center">
   	<div class="col-6">
   		{{ Form::open(['route'=>['videos.update', $video->id], 'method' => 'POST', 'files' => true]) }}
            <div class="form-group">
            	{{ Form::text('nombre_video', $video->nombre_video,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
               {{ Form::textarea('url', $video->url,['class' => 'form-control', 'rows' => 3, 'required']) }}
            </div>
            <div class="form-group">
            	{{ Form::select('marca', $categorias, $video->categoria_id,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
               <img src="{{ '/sisimages/videos/'.$video->imagen }}" width="200">
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