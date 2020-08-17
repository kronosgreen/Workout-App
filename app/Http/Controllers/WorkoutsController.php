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
      'workout-name' => 'required',
      'unit' => '',
    ]);

    if(!$data['unit']){
      $data['unit'] = '';
    }

    auth()->user()->workouts()->create($data);

    //  return redirect('/profile/' + auth()->user()->id);
    return redirect()->action(
      'ProfilesController@index', ['user' => auth()->user()->id]
    );
  }

}
