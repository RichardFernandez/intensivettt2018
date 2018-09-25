@extends('layouts.backend')

@section('titulos')

      <h1>LISTA DE SUPLEMENTOS</h1>
     
@endsection     


@section('content')


 {{-- boton para agregar nuevo suplementos --}}
    
 {{-- Seccion para desplegar categorias capturadas --}}

  <hr>
  
   <section>
    <div class="row">
      <div class="col">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Suplemento</th>
              <th>Tipo</th>
              <th>Marca</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
           @forelse($suplementos as $suplemento) 
            <tr>
               <td>{{ $suplemento->nombre_suplemento }}</td>
               <td>{{ $suplemento->tipo_suplemento }}</td>    
               <td>{{ $suplemento->imagen }}</td>    
               <td>{{ $suplemento->nombre_marca }}</td>      
               <td>
                <a href="{{ url('/suplementos/'.$medida->id.'/edit') }}">Editar</a><span> |</span>
                <a href="{{ url('/suplementos/'.$medida->id.'/delete') }}">Eliminar</a>
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