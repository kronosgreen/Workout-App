@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')

    <div class="row">
      <div class="col-8 offset-2">

        <div class="row">
          <h1>Edit Profile</h1>
        </div>

        <div class="form-group row">
          <label for="quote" class="col-md-4 col-form-label">Quote</label>
          <div class="col-md-6">
            <input id="quote"
              type="text"
              class="form-control @error('quote') is-invalid @enderror"
              name="quote"
              value="{{ old('quote') ?? $user->profile->quote}}"
              autofocus>

            @error('quote')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="row pb-4">
          <label for="image" class="col-md-4 col-form-label">Profile Image</label>
          <input type="file" class="form-control-file" id="image" name="image">

          @error('image')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="row">
          <button class="btn btn-primary">Save Profile</button>
        </div>

      </div>
    </div>

  </form>
</div>
@endsection
