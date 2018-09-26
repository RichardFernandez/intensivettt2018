@extends('layouts.backend')

@section('titulos')

      <h1>LISTA DE SUPLEMENTOS</h1>
     
@endsection     


@section('content')


 {{-- boton para agregar nuevo suplementos --}}
    
 {{-- Seccion para desplegar categorias capturadas --}}

  <hr>
  
   <section>
    {{-- boton para agregar un nuevo suplemento --}}
    <div class="row">
      <div class="col d-flex justify-content-end btn-add">
        <a href="{{route('suplementos.create')}}" title="Agregar nuevo suplemento"><i class="fas fa-plus-circle"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Imagen</th>
              <th>Suplemento</th>
              <th>Tipo</th>
              <th>Marca</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
           @forelse($suplementos as $suplemento) 
            <tr>
               <td><img src="{{ 'sisimages/suplementos/'.$suplemento->imagen }}" width="100"></td>
               <td>{{ $suplemento->nombre_suplemento }}</td>
               <td>{{ $suplemento->tipo_suplemento }}</td>        
               <td>{{ $suplemento->marcasuplemento->nombre_marca }}</td>      
               <td>
                <a href="{{ route('suplementos.edit', $suplemento->id) }}" class="alert alert-warning"><i class="fas fa-edit"></i></a>
              </td>
              <td>
                <a href="{{ url('/suplementos/'.$suplemento->id.'/destroy') }}" class="alert alert-danger"><i class="fas fa-minus-square"></i></a>
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
        @if(count($suplementos))
          <p>{{ $suplementos }}</p> 
        @endif
      </div>
    </div>
   </section>

@endsection