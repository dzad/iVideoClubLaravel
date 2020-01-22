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

  function postCreate(Request $request){
    $movie = new Movie();
    $movie->title = $request->input('title');
    $movie->year = $request->input('year');
    $movie->director = $request->input('director');
    $movie->synopsis = $request->input('synopsis');
    $movie->poster = $request->input('poster');
    $movie->rented = false;
    $movie->save();
    return redirect()->action('CatalogController@getIndex');
  }

  function putEdit(Request $request, $id){
    $movie = Movie::findOrFail($id);
    $movie->title = $request->input('title');
    $movie->year = $request->input('year');
    $movie->director = $request->input('director');
    $movie->synopsis = $request->input('synopsis');
    $movie->poster = $request->input('poster');
    $movie->save();
    return redirect()->action('CatalogController@getShow', ['id' => $id]);
  }
}
