@extends('layouts.backend')

@section('titulos')

      <h1>RECETAS</h1>
     
@endsection     


@section('content')


 {{-- boton para agregar nuevo suplementos --}}
    
 {{-- Seccion para desplegar categorias capturadas --}}

  <hr>
  
   <section>
    {{-- boton para agregar un nuevo suplemento --}}
    <div class="row">
      <div class="col d-flex justify-content-end btn-add">
        <a href="{{route('recetas.create')}}" title="Agregar nueva receta"><i class="fas fa-plus-circle"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Nombre de receta</th>
              <th>Masotipo</th>
              <th>Imagen</th>
              <th>Video</th>
              <th>Ver</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
           @forelse($recetas as $receta) 
            <tr>
               <td>{{ $receta->nombre_receta }}</td>
               <td>{{ $receta->masotipo }}</td> 
               <td><img src="{{'sisimages/recetas/'.$receta->imagen }}" width="100"></td>     
               <td>{{ $receta->video }}</td>    
               <td><a href="{{ route('recetas.show', $receta->id) }}" class="alert alert-primary"><i class="far fa-eye"></i></a></td>
               <td>
                <a href="{{ route('recetas.edit', $receta->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a>
              </td>
              <td>
                <a href="{{ url('/recetas/'.$receta->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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
        @if(count($recetas))
          <p>{{ $recetas }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection