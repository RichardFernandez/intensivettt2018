@extends('layouts.backend')

@section('titulos')

      <h1>ESTADOS</h1>
     
@endsection     


@section('content')


 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      <div class="col-12">
        {!! Form::open(['url' => '/estados', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::text('nombre_estado','',['class' => 'form-control', 'placeholder'=>'Escribe el estado']) }}
               @if ($errors->any())
                  @foreach($errors->get('nombre_estado') as $error)
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
              <th>Nombre del estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
           @forelse($estados as $estado) 
            <tr>
               <td>{{ $estado->nombre_estado }}</td>    
               <td>
                <a href="{{ url('/estados/'.$estado->id.'/edit') }}">Editar</a><span> |</span>
                <a href="{{ url('/estados/'.$estado->id.'/delete') }}">Eliminar</a>
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
        @if(count($estados))
          <p>{{ $estados }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection