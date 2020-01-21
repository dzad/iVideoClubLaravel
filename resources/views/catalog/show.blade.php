@extends('layouts.master')

@section('content')

  <div class="row">

    <div class="col-sm-4">

        <img src="{{$pelicula['poster']}}" />

    </div>
    <div class="col-sm-8">

      <h4 style="min-height:45px;margin:5px 0 10px 0">
          {{$pelicula['title']}}
      </h4>
      <p>
        Año: {{$pelicula['year']}}<br>
        Director: {{$pelicula['director']}}<br>
      </p>
      <p>
        <b>Resumen: </b> {{$pelicula['synopsis']}}
      </p>
      <p>
        <b>Estado: </b>
        @if( $pelicula['rented'] === false )
          Película disponible
        @else
          Película actualmente alquilada
          @endif
      </p>

          @if( $pelicula['rented'] === false )
            <a class="btn btn-primary" href="#" role="button">Alquilar película</a>
          @else
            <a class="btn btn-danger" href="#" role="button">Devolver película</a>
          @endif


          <a class="btn btn-warning" href="#" role="button"><i class="fa fa-edit"></i>Editaer película</a>

          <a class="btn btn-outline-dark" href="#" role="button"><i class="fa fa-chevron-left"></i>Volver al listado</a>

      </div>

    </div>
  </div>

@stop
