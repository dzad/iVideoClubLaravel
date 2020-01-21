<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
  function getHome(){
    return view("home");
  }

  function getIndex(){
    return view("catalog.index");
  }

  function getShow($id){
    return view('catalog.show', array("id"=>$id));
  }

  function getCreate(){
    return view('catalog.create');
  }

  function getEdit($id){
    return view('catalog.edit', array('id' => $id));
  }
}
