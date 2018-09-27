@extends('layouts.backend')

@section('titulos')

      <h1>REGISTRO DE SUPLEMENTOS</h1>
     
@endsection     


@section('content')

   <div class="row justify-content-center">
   	<div class="col-6">
   		{{ Form::open(['route'=>'suplementos.store', 'method' => 'POST', 'files' => true]) }}
            <div class="form-group">
            	{{ Form::text('nombre_suplemento', '',['class' => 'form-control', 'placeholder' => 'Nombre del suplemento', 'required']) }}
            </div>
            <div class="form-group">
            	{{ Form::select('tipo_suplemento', ['' => 'Selecciona el tipo de suplemento','Proteinas' => 'Proteinas', 'Vitaminas' => 'Vitaminas', 'Termogenicos' => 'Termogenicos', 'Preentrenamientos' => 'Preentrenamientos', 'Reductores' => 'Reductores', 'Creatinas' => 'Creatinas', 'Glutaminas' => 'Glutaminas', 'Aminoacidos' => 'Aminoacidos', 'Variados' => 'Variados'], null, ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
            	{{ Form::select('marca', $marcas, null,['class' => 'form-control', 'placeholder' => 'Selecciona la marca']) }}
            </div>
            <div class="form-group">
            	{{ Form::file('imagen',['class' => 'form-control']) }}
            </div>
            <div class="form-group">
            	{{ Form::submit('Guardar registro',['class' => 'btn btn-success btn-guardar']) }}
               <a href="{{ route('suplementos.index') }}" class="btn-secondary">Cancelar</a>
            </div>
   		{{ Form::close() }}
   	</div>
   </div>

@endsection
