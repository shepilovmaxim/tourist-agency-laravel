@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <form method="post" enctype="multipart/form-data" style="text-align: center">
  @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="stars">Stars:</label>
      <select name="stars" id="stars" class="form-control" required>
        <option value="1">1*</option>
        <option value="2">2*</option>
        <option value="3">3*</option>
        <option value="4">4*</option>
        <option value="5">5*</option>
      </select>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" class="form-control-file" required>
    </div>
    <div class="form-group">
      <input type="submit" value="Add" class="btn btn-primary">
    </div>
  </form>
</div>

@endsection