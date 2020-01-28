@extends('layouts.master')

@section('content')

  <div class="row">

    <div class="col-sm-4">

        <img src="{{$pelicula->poster}}" class="img-fluid"/>

    </div>
    <div class="col-sm-8">

      <h4 style="min-height:45px;margin:5px 0 10px 0">
          {{$pelicula->title}}
      </h4>
      <p>
        Año: {{$pelicula->year}}<br>
        Director: {{$pelicula->director}}<br>
      </p>
      <p>
        <b>Resumen: </b> {{$pelicula->synopsis}}
      </p>
      <p>
        <b>Estado: </b>
        @if( $pelicula->rented === false )
          Película disponible
        @else
          Película actualmente alquilada
          @endif
      </p>

            @if( $pelicula->rented === false )
              <form action="{{action('CatalogController@putRent', $pelicula->id)}}"
                method="POST" style="display:inline">
                @method('PUT')
                @csrf
                <button class="btn btn-primary" type="submit">Alquilar película</button>
              </form>
            @else
              <form action="{{action('CatalogController@putReturn', $pelicula->id)}}"
                method="POST" style="display:inline">
                @method('PUT')
                @csrf
                <button class="btn btn-primary" type="submit">Alquilar película</button>
              </form>
            @endif


          <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $pelicula->id ) }}" role="button"><i class="fa fa-edit"></i>Editaer película</a>

          <a class="btn btn-outline-dark" href="{{ url('/catalog/') }}" role="button"><i class="fa fa-chevron-left"></i> Volver al listado</a>

          <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}"
            method="POST" style="display:inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Eliminar</button>
          </form>
      </div>

    </div>
  </div>

@stop
