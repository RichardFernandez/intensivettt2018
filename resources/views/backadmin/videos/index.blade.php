@extends('layouts.backend')

@section('titulos')

      <h1>LISTA DE VIDEOS</h1>
     
@endsection     


@section('content')


 {{-- boton para agregar nuevo suplementos --}}
    
 {{-- Seccion para desplegar categorias capturadas --}}

  <hr>
  
   <section>
    {{-- boton para agregar un nuevo suplemento --}}
    <div class="row">
      <div class="col d-flex justify-content-end btn-add">
        <a href="{{route('videos.create')}}" title="Agregar nuevo video"><i class="fas fa-plus-circle"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Imagen</th>
              <th>Nombre de ejercicio</th>
              <th>Video</th>
              <th>Categoria</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
           @forelse($videos as $video) 
            <tr>
               <td><img src="{{ 'sisimages/videos/'.$video->imagen }}" width="100"></td>
               <td>{{ $video->nombre_video }}</td>
               <td>
                <iframe src="https://player.vimeo.com/video/{{ $video->url }}" width="300" height="100" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </td>        
               <td>{{ $video->categoria->nombre_categoria }}</td>      
               <td>
                <a href="{{ route('videos.edit', $video->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a>
              </td>
              <td>
                <a href="{{ url('/videos/'.$video->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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
        @if(count($videos))
          <p>{{ $videos }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection