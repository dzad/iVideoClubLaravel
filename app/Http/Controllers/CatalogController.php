<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{

  function getIndex(){
    $movies = Movie::all();
    return view("catalog.index", array("arrayPeliculas" => $movies) );
  }

  function getShow($id){
    $movie = Movie::findOrFail($id);
    return view('catalog.show', array("pelicula"=>$movie));
  }

  function getCreate(){
    return view('catalog.create');
  }

  function getEdit($id){
    $movie = Movie::findOrFail($id);
    return view('catalog.edit', array('pelicula' => $movie));
  }
}
