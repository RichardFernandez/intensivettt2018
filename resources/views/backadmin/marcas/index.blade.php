@extends('layouts.backend')

@section('titulos')

      <h1>MARCAS DE SUPLEMENTOS</h1>
     
@endsection     


@section('content')


 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      <div class="col-12">
        {!! Form::open(['url' => '/marcas', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::text('nombre_marca','',['class' => 'form-control', 'placeholder'=>'Escribe la marca de suplemento']) }}
               @if ($errors->any())
                  @foreach($errors->get('nombre_marca') as $error)
                     <div class="invalid-feedback">{{$error}}</div>
                  @endforeach
               @endif
              </div>
            </div>
            
           <div class="col-6">
             <div class="form-group offset-1">
             {{ Form::submit('Guardar registro',['class' => 'btn btn-success btn-guardar'] )}}
             </div>
           </div>
          </div>
        {!! Form::close() !!}
      </div>
        
    </div>
 {{-- Seccion para desplegar categorias capturadas --}}

  <hr>
  
   <section>
   	<div class="row">
   		<div class="col">
   			<table class="table table-bordered table-striped">
   				<thead class="thead-dark">
   					<tr>
   						<th>Nombre de la marca de suplemento</th>
   						<th>Acciones</th>
   					</tr>
   				</thead>
   				<tbody>
           @forelse($marcas as $marca) 
   					<tr>
               <td>{{ $marca->nombre_marca }}</td>    
               <td>
                <a href="{{ url('/marcas/'.$marca->id.'/edit') }}">Editar</a><span> |</span>
                <a href="{{ url('/marcas/'.$marca->id.'/delete') }}">Eliminar</a>
              </td>
               
            </tr>
            @empty
             <p>No hay registros capturados</p>
           @endforelse

   				</tbody>
   			</table>
   		</div>
   	</div>
    <div class="row">
      <div class="col">
        @if(count($marcas))
          <p>{{ $marcas }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection