@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/w" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
      <div class="col-8 offset-2">

        <div class="row">
          <h1>Create New Workout</h1>
        </div>

        <div class="form-group row">
          <label for="workout-name" class="col-md-4 col-form-label">Workout</label>
          <div class="col-md-6">
            <input id="workout-name"
              type="text"
              class="form-control @error('workout-name') is-invalid @enderror"
              name="workout-name"
              value="{{ old('workout-name') }}"
              required autocomplete="workout-name"
              autofocus>

            @error('workout-name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="unit" class="col-md-4 col-form-label">Unit</label>
          <div class="col-md-6">
            <input id="unit"
              type="text"
              class="form-control @error('unit') is-invalid @enderror"
              name="unit"
              value="{{ old('unit') }}"
              autofocus>

            @error('unit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="row">
          <button class="btn btn-primary">Add New Workout</button>
        </div>

      </div>
    </div>
  </form>
</div>
@endsection
