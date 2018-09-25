@extends('layouts.backend')

@section('titulos')

      <h1>FRASES MOTIVADORAS</h1>
     
@endsection     


@section('content')


 {{-- seccion para capturar nuev categoria de video --}}
    <div class="row">
      <div class="col-12">
        @if(isset($fraseEdit))
              <h3>Ya puedes editar el registro!!</h3>

              {{ Form::open(['route' => ['frases.update', $fraseEdit->id], 'method' => 'PUT']) }}
                <div class="row">
                   <div class="col-4">
                    <div class="form-group">  
                      {{ Form::textarea('frase',$fraseEdit->frase,['class' => 'form-control', 'rows' => 3, 'required']) }}
                    </div>
                   </div>
                   <div class="col-8">
                    <div class="form-group">
                      {{ Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-blue']) }}
                      <a href="{{ route('frases.index') }}" class="btn-secondary">Cancelar</a>
                    </div>
                   </div>
                  
                </div>
             {{ Form::close() }}

         @else
        {!! Form::open(['url' => '/frases', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-6">
               <div class="form-group">
               {{ Form::textarea('frase','',['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Escribe la frase'], 'required') }}
               @if ($errors->any())
                  @foreach($errors->get('frase') as $error)
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
   						<th>Frase</th>
   						<th>Acciones</th>
   					</tr>
   				</thead>
   				<tbody>
           @forelse($frases as $frase) 
   					<tr>
               <td>{{ $frase->frase}}</td>    
               <td>
                <a href="{{ route('frases.edit', $frase->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a><span> |</span>
                <a href="{{ url('/frases/'.$frase->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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