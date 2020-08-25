@extends('layouts.app')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@section('content')
<div class="container">
  <form action="/w" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
      <div class="col-8 offset-2">

        <div class="row">
          <h1>Create New Workout</h1>
        </div>

        <!--
        Insert Workout Type
        -->
        <div class="form-group row">
          <label for="workout-type" class="col-md-4 col-form-label">Workout</label>
          <div class="col-md-6">
            <input id="workout-type"
              type="text"
              class="typeahead form-control @error('workout-type') is-invalid @enderror"
              name="workout-type"
              value="{{ old('workout-type') }}"
              required autocomplete="workout-type"
              autofocus>

              <script type="text/javascript">
                  var path = "{{ route('autocomplete') }}";
                  $('input.typeahead').typeahead({
                      source:  function (query, process) {
                      return $.get(path, { query: query }, function (data) {
                              return process(data);
                          });
                      }
                  });
              </script>


            @error('workout-type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <!--
        Insert Workout Unit
        -->
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

        <!--
        Insert Count
        -->
        <div class="form-group row">
          <label for="count" class="col-md-4 col-form-label">Count</label>
          <div class="col-md-6">
            <input id="count"
              type="text"
              class="form-control @error('count') is-invalid @enderror"
              name="count"
              value="0"
              autofocus>

            @error('count')
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
