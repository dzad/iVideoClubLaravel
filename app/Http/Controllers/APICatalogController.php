<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class APICatalogController extends Controller
{

    public function __construct(){

          $this->middleware('auth.basic.once',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $movie = new Movie();
      if($request->input('title') != null){
        $movie->title = $request->input('title');
      }
      if($request->input('year') != null){
        $movie->year = $request->input('year');
      }
      if($request->input('director') != null ){
        $movie->director = $request->input('director');
      }
      if( $request->input('synopsis') != null){
        $movie->synopsis = $request->input('synopsis');
      }
      if( $request->input('poster') != null){
        $movie->poster = $request->input('poster');
      }
      if( $request->input('rented') != null){
        $movie->rented = false;
      }
      $movie->save();
      return response()->json(['error' => false,
                          'msg' =>'La película se ha guardado correctamente'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $movie = Movie::findOrFail($id);
      return response()->json($movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $movie = Movie::findOrFail($id);
      if($request->input('title') != null){
        $movie->title = $request->input('title');
      }
      if($request->input('year') != null){
        $movie->year = $request->input('year');
      }
      if($request->input('director') != null ){
        $movie->director = $request->input('director');
      }
      if( $request->input('synopsis') != null){
        $movie->synopsis = $request->input('synopsis');
      }
      if( $request->input('poster') != null){
        $movie->poster = $request->input('poster');
      }
      if( $request->input('rented') != null){
        $movie->rented = false;
      }
      $movie->save();
      return response()->json(['error' => false,
                          'msg' =>'La película se ha modificado correctamente'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $movie = Movie::findOrFail($id);
      $movie->delete();
      return response()->json(['error' => false,
                          'msg' =>'La película se ha borrado'],200);
    }

    function putRent(Request $request, $id){
      $movie = Movie::findOrFail($id);
      $movie->rented = true;
      $movie->save();

      return response()->json(['error' => false,
                          'msg' =>'La película se ha alquilado'], 200);
    }

    function putReturn(Request $request, $id){
      $movie = Movie::findOrFail($id);
      $movie->rented = false;
      $movie->save();

      return response()->json(['error' => false,
                          'msg' =>'La película ha sido devuelto '], 200);
    }
}
