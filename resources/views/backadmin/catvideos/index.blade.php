@extends('layouts.backend')

@section('titulos')

      <h1>CATEGORÍAS DE VÍDEOS</h1>
     
@endsection     


@section('content')

 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      {{-- @include('flash::message') --}}
      <div class="col-12">
        @if(isset($categoriaEdit))
       <h3>Ya puedes editar el registro!!</h3>

              {{ Form::open(['route' => ['categorias.update', $categoriaEdit->id], 'method' => 'PUT', 'class' => 'catalogos']) }}
                <div class="row">
                   <div class="col-4">
                    <div class="form-group">  
                      {{ Form::text('nombre_categoria',$categoriaEdit->nombre_categoria,['class' => 'form-control']) }}
                    </div>
                   </div>
                   <div class="col-8">
                    <div class="form-group">
                      {{ Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-blue']) }}
                      <a href="{{ route('categorias.index') }}" class="btn-secondary">Cancelar</a>
                    </div>
                   </div>
                  
                </div>
             {{ Form::close() }}

      @else
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

      @endif
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
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a><span> |</span>
                <a href="{{ url('categorias/'.$categoria->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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