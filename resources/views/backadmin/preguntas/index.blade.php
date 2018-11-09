@extends('layouts.backend')

@section('titulos')

      <h1>PREGUNTAS FRECUENTES</h1>
     
@endsection     


@section('content')

 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      {{-- @include('flash::message') --}}
      <div class="col-12">
        @if(isset($preguntaEdit))
       <h3>Ya puedes editar el registro!!</h3>

              {{ Form::open(['route' => ['preguntas.update', $preguntaEdit->id], 'method' => 'PUT', 'class' => 'catalogos']) }}
                <div class="row">
                   <div class="col-8">
                    <div class="form-group">  
                      {{ Form::text('pregunta',$preguntaEdit->pregunta,['class' => 'form-control']) }}
                    </div>    
                   </div>
                </div>
                <div class="row">
                   <div class="col-8">
                    <div class="form-group">  
                      {{ Form::textarea('respuesta',$preguntaEdit->respuesta,['class' => 'form-control', 'rows' => 4]) }}
                    </div>    
                   </div>
                </div>
                <div class="row">   
                   <div class="col-8">
                    <div class="form-group">
                      {{ Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-blue']) }}
                      <a href="{{ route('preguntas.index') }}" class="btn-secondary">Cancelar</a>
                    </div>
                   </div>
                  
                </div>
             {{ Form::close() }}

      @else
        {!! Form::open(['url' => '/preguntas', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-8">
               <div class="form-group">
               {{ Form::text('pregunta','',['class' => 'form-control', 'placeholder'=>'Pregunta']) }}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
               <div class="form-group">
               {{ Form::textarea('respuesta','',['class' => 'form-control', 'rows'=>4, 'placeholder'=>'Respuesta']) }}
              </div>
            </div>
          </div>
          <div>
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
   						<th>Pregunta</th>
              <th>Respuesta</th>
   						<th>Acciones</th>
   					</tr>
   				</thead>
   				<tbody>
           @forelse($preguntas as $pregunta) 
   					<tr>
               <td>{{ $pregunta->pregunta }}</td>    
               <td>{{ $pregunta->respuesta }}</td>    
               <td>
                <a href="{{ route('preguntas.edit', $pregunta->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a><span> |</span>
                <a href="{{ url('preguntas/'.$pregunta->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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
        @if(count($preguntas))
          <p>{{ $preguntas }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection