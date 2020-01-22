<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{

  function getIndex(){
    return view("catalog.index", array("arrayPeliculas" => $this->arrayPeliculas) );
  }

  function getShow($id){
    return view('catalog.show', array("pelicula"=>$this->arrayPeliculas[$id]));
  }

  function getCreate(){
    return view('catalog.create');
  }

  function getEdit($id){
    return view('catalog.edit', array('id' => $id));
  }
}
