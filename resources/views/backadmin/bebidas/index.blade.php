@extends('layouts.backend')

@section('titulos')

      <h1>BEBIDAS</h1>
     
@endsection     


@section('content')

 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      {{-- @include('flash::message') --}}
      <div class="col-12">
        @if(isset($bebidaEdit))
       <h3>Ya puedes editar el registro!!</h3>

              {{ Form::open(['route' => ['bebidas.update', $bebidaEdit->id], 'method' => 'PUT', 'class' => 'catalogos']) }}
                <div class="row">
                   <div class="col-4">
                    <div class="form-group">  
                      {{ Form::text('nombre_bebida',$bebidaEdit->nombre_bebida,['class' => 'form-control']) }}
                    </div>
                   </div>
                   <div class="col-8">
                    <div class="form-group">
                      {{ Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-blue']) }}
                      <a href="{{ route('bebidas.index') }}" class="btn-secondary">Cancelar</a>
                    </div>
                   </div>
                  
                </div>
             {{ Form::close() }}

      @else
        {!! Form::open(['url' => '/bebidas', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::text('nombre_bebida','',['class' => 'form-control', 'placeholder'=>'Bebida']) }}
               @if ($errors->any())
                  @foreach($errors->get('nombre_bebida') as $error)
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
   						<th>Bebida</th>
   						<th>Acciones</th>
   					</tr>
   				</thead>
   				<tbody>
           @forelse($bebidas as $bebida) 
   					<tr>
               <td>{{ $bebida->nombre_bebida }}</td>    
               <td>
                <a href="{{ route('bebidas.edit', $bebida->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a><span> |</span>
                <a href="{{ url('bebidas/'.$bebida->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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
        @if(count($bebidas))
          <p>{{ $bebidas }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection