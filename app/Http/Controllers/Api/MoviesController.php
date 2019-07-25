<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class MoviesController extends Controller
{
  public function index(){
    $movies = Movie::all();
    return response()->json([
      'success' => true,
      'result' => $movies
    ]);
  }

  public function show($id){
    $movie = Movie::find($id);
    if(!empty($movie)){
      return response()->json([
        'success' => true,
        'result' => $movie
      ]);
    }
    return response()->json([
      'success' => false,
      'error' => 'Film con id '. $id .' inesistente'
    ]);
  }

  public function store(Request $request){
    $data = $request->all();
    $newfilm = new Movie;
    $newfilm->fill($data);
    $newfilm->save();

    return response()->json([
      'success' => true,
      'result' => $newfilm
    ]);
  }

  public function update(Request $request, $id){
    $movie = Movie::find($id);
    $data = $request->all();
    if(!empty($movie)){
      $movie->update($data);
      return response()->json([
        'success' => true,
        'result' => $movie
      ]);
    }
    return response()->json([
      'success' => false,
      'error' => 'Film con id '. $id .' inesistente'
    ]);
  }

  public function destroy($id){
    $movie = Movie::find($id);
    if(!empty($movie)){
      $movie->delete();
      return response()->json([
        'success' => true,
        'result' => []
      ]);
    }
    return response()->json([
      'success' => false,
      'error' => 'Film con id '. $id .' inesistente'
    ]);
  }
}
