@extends('layouts.backend')

@section('titulos')

      <h1>FRASES MOTIVADORAS</h1>
     
@endsection     


@section('content')


 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      <div class="col-12">
        {!! Form::open(['url' => '/frases', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::text('frase','',['class' => 'form-control', 'placeholder'=>'Escribe la frase']) }}
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
   						<th>Frase</th>
   						<th>Acciones</th>
   					</tr>
   				</thead>
   				<tbody>
           @forelse($frases as $frase) 
   					<tr>
               <td>{{ $frase->frase }}</td>    
               <td>
                <a href="{{ url('/frases/'.$frase->id.'/edit') }}">Editar</a><span> |</span>
                <a href="{{ url('/frases/'.$frase->id.'/delete') }}">Eliminar</a>
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
        @if(count($frases))
          <p>{{ $frases }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection