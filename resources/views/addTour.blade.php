@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <form action="{{route('tours.add')}}" method="POST" enctype="multipart/form-data" style="text-align: center">
  @csrf
  @method('POST')
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control form-control-sm" required>
    </div>
    <div class="form-group">
      <label for="type">Type of tour:</label>
      <select id="type" name="type_id" class="form-control form-control-sm" required>
        <option value="1">Vacation</option>
        <option value="2">Excursion</option>
        <option value="3">Shopping</option>
      </select>
    </div>
    <div class="form-group">
      <label for="people">Num. of people:</label>
      <select id="people" name="people" class="form-control form-control-sm" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" name="price" id="price" class="form-control form-control-sm" required>
    </div>
    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" name="start_date" id="date" class="form-control form-control-sm" required>
    </div>
    <div class="form-group">
      <label for="duration">Duration:</label>
      <input type="number" min="1" max="31" name="duration" id="duration" class="form-control form-control-sm" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea name="description" id="description" class="form-control form-control-sm" required></textarea>
    </div>
    <div class="form-group">
      <label for="hotel">Hotel:</label>
      <select name="hotel_id" id="hotel" class="form-control form-control-sm" required>
      @foreach ($hotels as $hotel)
        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
      @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="quantity">Quantity:</label>
      <input type="number" min="0" max="500" class="form-control form-control-sm" name="amount" required>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" class="form-control-file" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </form>
</div>

@endsection