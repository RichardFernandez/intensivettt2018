@extends('layouts.backend')

@section('content')

   <section class="encabezado">
    	<h1>CATEGORÍAS DE VÍDEOS</h1>
    </section>

 {{-- seccion para capturar nuev categoria de video --}}
    <section>
   	     {!! Form::open(['url' => '/catvideos', 'method' => 'POST']) !!}
   	        <div class="form-group">
   	        	{{ Form::text('nombre_categoria','',['class' => 'form-control', 'placeholder'=>'Escribe la categoria de video']) }}
   	        </div>
   	        
   	        <div class="form-group text-right">
   	        	{{ Form::submit('Guardar',['class' => 'btn btn-success'] )}}
   	        </div>
   	     {!! Form::close() !!}
    </section>
 {{-- Seccion para desplegar categorias capturadas --}}

  <hr>
  
   <section>
   	<div class="row">
   		<div class="col">
   			<table class="table table-bordered">
   				<thead>
   					<tr>
   						<td>Nombre de la categoría de vídeo</td>
   						<td>Acciones</td>
   					</tr>
   				</thead>
   				<tbody>
   					<tr></tr>
   				</tbody>
   			</table>
   		</div>
   	</div>
   </section>

@stop