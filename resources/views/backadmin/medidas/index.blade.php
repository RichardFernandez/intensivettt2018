@extends('layouts.backend');

@section('content')

    <section class="encabezado">
    	<h1>UNIDADES DE MEDIDA</h1>
    </section>

 {{-- seccion para capturar nueva medida --}}
    <section>
   	     {!! Form::open(['url' => '/medidas', 'method' => 'POST']) !!}
   	        <div class="form-group">
   	        	{{ Form::text('nombre_medida','',['class' => 'form-control', 'placeholder'=>'Escribe el nombre de la medida']) }}
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
   						<td>Nombre de la unidad</td>
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