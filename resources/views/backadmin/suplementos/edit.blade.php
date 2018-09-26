@extends('layouts.backend')

@section('titulos')

      <h1>EDICIÓN DE SUPLEMENTO</h1>
     
@endsection     


@section('content')

   <div class="row justify-content-center">
   	<div class="col-6">
   		{{ Form::open(['route'=>['suplementos.update', $suplemento->id], 'method' => 'PUT', 'files' => true]) }}
            <div class="form-group">
            	{{ Form::text('nombre_suplemento', $suplemento->nombre_suplemento,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
            	{{ Form::select('tipo_suplemento', ['' => 'Selecciona el tipo de suplemento','Proteinas' => 'Proteinas', 'Vitaminas' => 'Vitaminas', 'Termogenicos' => 'Termogenicos', 'Preentrenamientos' => 'Preentrenamientos', 'Reductores' => 'Reductores', 'Creatinas' => 'Creatinas', 'Glutaminas' => 'Glutaminas', 'Aminoacidos' => 'Aminoacidos', 'Variados' => 'Variados'], $suplemento->tipo_suplemento, ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
            	{{ Form::select('marca', $marcas, $suplemento->marca,['class' => 'form-control', 'placeholder' => 'Selecciona la marca']) }}
            </div>
            <div class="form-group">
               <img src="{{ '/sisimages/suplementos/'.$suplemento->imagen }}" width="200">
            	{{ Form::file('imagen',['class' => 'form-control']) }}
            </div>
            <div class="form-group">
            	{{ Form::submit('Guardar registro',['class' => 'btn btn-success btn-guardar']) }}
            </div>
   		{{ Form::close() }}
   	</div>
   </div>

@endsection
