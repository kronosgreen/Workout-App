<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutsController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function create(){
    return view('workouts.create');
  }

  public function store(){
    $data = request()->validate([
      'workout-type' => 'required',
      'count' => 'numeric|required',
      'unit' => '',
    ]);

    if(!$data['unit']){
      $data['unit'] = '';
    }

    dd($data);


    auth()->user()->workouts()->create($data);

    return redirect()->action(
      'ProfilesController@index', ['user' => auth()->user()->id]
    );
  }

}
