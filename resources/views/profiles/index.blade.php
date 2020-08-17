@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">

      <div class="col-3 p-5">
        <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" height="100-pt">
      </div>

      <div class="col-9 pt-5">

        <div class="d-flex justify-content-between">

          <h1>{{ $user->username }}<h1>

          @can ('update', $user->profile)
            <a href="/w/create" class="btn btn-outline-dark"><h2>+</h2></a>
          @endcan

        </div>

        @can ('update', $user->profile)
          <div><a href="/profile/{{$user->id}}/edit">Edit Profile</a></div>
        @endcan

        <div>
          {{ $user->profile->quote }}
        </div>

      </div>
  </div>

  <div class="row">

  @foreach($user->workouts as $workout)

  <div class="col-6 p-5 align-center">
    <h3 class="text-uppercase">{{$workout['workout-name']}}</h3>
    <workoutview></workoutview>
  </div>

  @endforeach

  </div>

</div>
@endsection
