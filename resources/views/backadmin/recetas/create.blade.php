@extends('layouts.backend')

@section('titulos')

      <h1>CAPTURA DE RECETAS</h1>
     
@endsection 

@section('content')

   <div class="contenedor">
   	 <div class="row">
   	 	<div class="col-10 offset-1">

	   		{{Form::open(['route' => 'recetas.store', 'method' => 'POST', 'files' => true])}}
              <h4>Receta</h4>
	   		  <div class="row">
	   		  	<div class="col-3">
	   		  		<div class="form-group">
	   		  			{{ Form::label('nombre_receta', 'Nombre Receta' )  }}
	   		  		    {{Form::text('nombre_receta','',['class' => 'form-control', 'required'])}}
	   		  	    </div>
	   		  	</div> 
	   		  	<div class="col-3">
	   		  		<div class="form-group">
	   		  			{{ Form::label('masotipo', 'Somatotipo') }}
	   		  			{{ Form::select('masotipo', ['hectomorfo' => 'hectomorfo', 'mesomorfo' => 'Mesomorfo', 'endomorfo' => 'Endomorfo', 'vegetariano' => 'Vegetariano', 'vegano' => 'Vegano'], '',['class' => 'form-control', 'required']) }}
	   		  		</div>
	   		  	</div>
	   		  	<div class="col-3">
	   		  		<div class="form-group">
	   		  			{{ Form::label('video', 'Video') }}
	   		  			{{ Form::text('video', '',['class' => 'form-control', 'required']) }}
	   		  		</div>
	   		  	</div>
	   		  	<div class="col-3">
	   		  		<div class="form-group">
	   		  			{{ Form::label('imagen', 'Imagen') }}
	   		  			{{ Form::file('imagen',['class' => 'form-control']) }}
	   		  		</div>
	   		  	</div>
	   		  </div>
              <hr>
              <h4>Insumos</h4>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::label('insumo_id', 'Insumos') }}
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::label('cantidad', 'Cantidades') }}
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::label('medida_id', 'Unidades') }}
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <div class="row">
	   		  		<div class="col-4">
	   		  			<div class="form-group">
	   		  				{{ Form::select('insumo_id[]', $insumos, '',['class' => 'form-control insumo','placeholder' => 'Selecciona el insumo']) }}
	   		  			</div>
	   		  		</div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::number('cantidad[]','',['class' => 'form-control', 'step' => 0.01]) }}
		   		  	   	</div>
	   		  	   </div>
	   		  	   <div class="col-4">
		   		  	   	<div class="form-group">
		   		  	   		{{ Form::select('medida_id[]', $medidas, '',['class' => 'form-control insumo', 'placeholder' => 'Selecciona la unidad de medida']) }}
		   		  	   	</div>
	   		  	   </div>
	   		  </div>
	   		  <hr>
	   		     		  <div class="row">
	   		     		  	<div class="col-6">
	   		     		  		<h4>Preparación</h4>
	   		     		  		<div class="row">
	   		     		  			<div class="col-12">
	   		     		  				<div class="form-group">
	   		     		  					{{ Form::label('paso', 'Paso 1') }}
	   		     		  					{{ Form::text('paso[]', '',['class' => 'form-control']) }}
	   		     		  				</div>
	   		     		  			</div>
	   		     		  			<div class="col-12">
	   		     		  				<div class="form-group">
	   		     		  					{{ Form::label('paso', 'Paso 2') }}
	   		     		  					{{ Form::text('paso[]', '',['class' => 'form-control']) }}
	   		     		  				</div>
	   		     		  			</div>
	   		     		  			<div class="col-12">
	   		     		  				<div class="form-group">
	   		     		  					{{ Form::label('paso', 'Paso 3') }}
	   		     		  					{{ Form::text('paso[]', '',['class' => 'form-control']) }}
	   		     		  				</div>
	   		     		  			</div>
	   		     		  			<div class="col-12">
	   		     		  				<div class="form-group">
	   		     		  					{{ Form::label('paso', 'Paso 4') }}
	   		     		  					{{ Form::text('paso[]', '',['class' => 'form-control']) }}
	   		     		  				</div>
	   		     		  			</div>
	   		     		  			<div class="col-12">
	   		     		  				<div class="form-group">
	   		     		  					{{ Form::label('paso', 'Paso 5') }}
	   		     		  					{{ Form::text('paso[]', '',['class' => 'form-control']) }}
	   		     		  				</div>
	   		     		  			</div><div class="col-12">
	   		     		  				<div class="form-group">
	   		     		  					{{ Form::label('paso', 'Paso 6') }}
	   		     		  					{{ Form::text('paso[]', '',['class' => 'form-control']) }}
	   		     		  				</div>
	   		     		  			</div>
	   		     		  		</div>
	   		     		  	</div>
	   		     		  	<div class="col-4 offset-1">
	   		     		  		    <div class="form-group">
	   		     		  		        <a href="{{ url('/recetas') }}" class="btn btn-secondary">Regresar</a><br><br>
	   		     		  		        {{ Form::submit('GUARDAR', ['class' => 'btn btn-success btn-blue']) }}
	   		     		  		    </div>
	   		     		  	</div>
	   		     		 </div> 	

              <hr>
	   		
	   		{{Form::close()}}
	   		</div>

   	</div>
   </div>

@stop()

@section('js')
  <script>
  	$(document).ready(function(){
      $(".insumo").chosen();
  	});
  	
  </script>
@stop()