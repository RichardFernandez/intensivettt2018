@extends('layouts.backend')

@section('titulos')

      <h1>CATEGORÍAS DE VÍDEOS</h1>
     
@endsection     


@section('content')


 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      <div class="col-12">
        {!! Form::open(['url' => '/categorias', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::text('nombre_categoria','',['class' => 'form-control', 'placeholder'=>'Escribe la categoria de video']) }}
               @if ($errors->any())
                  @foreach($errors->get('nombre_categoria') as $error)
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
   						<th>Nombre de la categoría de vídeo</th>
   						<th>Acciones</th>
   					</tr>
   				</thead>
   				<tbody>
           @forelse($categorias as $categoria) 
   					<tr>
               <td>{{ $categoria->nombre_categoria }}</td>    
               <td>
                <a href="{{ url('/categorias/'.$categoria->id.'/edit') }}">Editar</a><span> |</span>
                <a href="{{ url('/categorias/'.$categoria->id.'/delete') }}">Eliminar</a>
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
        @if(count($categorias))
          <p>{{ $categorias }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection