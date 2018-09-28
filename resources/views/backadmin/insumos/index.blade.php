@extends('layouts.backend')

@section('titulos')

      <h1>INSUMOS</h1>
     
@endsection     


@section('content')


 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      <div class="col-12">
        @if(isset($insumoEdit))
              <h3>Ya puedes editar el registro!!</h3>

              {{ Form::open(['route' => ['insumos.update', $insumoEdit->id], 'method' => 'PUT']) }}
                <div class="row">
                   <div class="col-4">
                    <div class="form-group">  
                      {{ Form::text('nombre_insumo',$insumoEdit->nombre_insumo,['class' => 'form-control']) }}
                    </div>
                   </div>
                   <div class="col-8">
                    <div class="form-group">
                      {{ Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-blue']) }}
                      <a href="{{ route('insumos.index') }}" class="btn-secondary">Cancelar</a>
                    </div>
                   </div>
                  
                </div>
             {{ Form::close() }}

      @else
        {!! Form::open(['url' => '/insumos', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::text('nombre_insumo','',['class' => 'form-control', 'placeholder'=>'Escribe el insumo']) }}
               @if ($errors->any())
                  @foreach($errors->get('nombre_insumo') as $error)
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
              <th>Nombre del insumo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
           @forelse($insumos as $insumo) 
            <tr>
               <td>{{ $insumo->nombre_insumo }}</td>    
               <td>
                <a href="{{ route('insumos.edit', $insumo->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a><span> |</span>
                <a href="{{ url('/insumos/'.$insumo->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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
        @if(count($insumos))
          <p>{{ $insumos }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection