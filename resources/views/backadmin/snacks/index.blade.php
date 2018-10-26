@extends('layouts.backend')

@section('titulos')

      <h1>SNACKS</h1>
     
@endsection     


@section('content')


 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      <div class="col-12">
        @if(isset($snackEdit))
              <h3>Ya puedes editar el registro!!</h3>

              {{ Form::open(['route' => ['snacks.update', $snackEdit->id], 'method' => 'PUT']) }}
                <div class="row">
                   <div class="col-4">
                    <div class="form-group">  
                      {{ Form::text('nombre_snack',$snackEdit->nombre_snack,['class' => 'form-control']) }}
                    </div>
                   </div>
                   <div class="col-8">
                    <div class="form-group">
                      {{ Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-blue']) }}
                      <a href="{{ route('snacks.index') }}" class="btn-secondary">Cancelar</a>
                    </div>
                   </div>
                  
                </div>
             {{ Form::close() }}

      @else
        {!! Form::open(['url' => '/snacks', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::text('nombre_snack','',['class' => 'form-control', 'placeholder'=>'Escribe el snack']) }}
               @if ($errors->any())
                  @foreach($errors->get('nombre_snack') as $error)
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
              <th>Nombre del snack</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
           @forelse($snacks as $snack) 
            <tr>
               <td>{{ $snack->nombre_snack }}</td>    
               <td>
                <a href="{{ route('snacks.edit', $snack->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a><span> |</span>
                <a href="{{ url('/snacks/'.$snack->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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
        @if(count($snacks))
          <p>{{ $snacks }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection