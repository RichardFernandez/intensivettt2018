@extends('layouts.backend')

@section('content')

   <section class="encabezado">
    	<h1>ESTADOS DE LA REPÚLICA</h1>
    </section>

 {{-- seccion para capturar nuevo estado --}}
    <section>
   	     {!! Form::open(['url' => '/estados', 'method' => 'POST']) !!}
   	        <div class="form-group">
   	        	{{ Form::text('nombre_estado','',['class' => 'form-control', 'placeholder'=>'Escribe el nombre del estado']) }}
   	        </div>
   	        
   	        <div class="form-group text-right">
   	        	{{ Form::submit('Guardar',['class' => 'btn btn-success'] )}}
   	        </div>
   	     {!! Form::close() !!}
    </section>
 {{-- Seccion para desplegar medidas capturadas --}}

  <hr>
  
   <section>
   	<div class="row">
   		<div class="col">
   			<table class="table table-bordered">
   				<thead>
   					<tr>
   						<td>Nombre del estado</td>
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