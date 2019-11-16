@extends('layouts.app')

@section('content')

  <div class="container-fluid" style="padding-left: 120px; padding-right: 120px;">
    <div class="row py-5">
      <div class="col d-flex justify-content-center">    
        <img src="/images/big_logo.png" class="img-fluid" width="700" height="300">
      </div>
    </div>
    <div>
      <div class="d-flex justify-content-center">
        <form method="get" class="d-flex justify-content-between align-items-center" style="width: 100vh;">
          <div>
            <label for="type">Type of tour:</label>
            <select id="type" name="typeId">
              <option value="0">Any</option>
              <option value="1">Vacation</option>
              <option value="2">Excursion</option>
              <option value="3">Shopping</option>
            </select>
          </div>
          <div>
            <label for="people">Num. of people:</label>
            <select id="people" name="people">
              <option value="0">Any</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div>
            <label for="hotel">Hotel:</label>
            <select id="hotel" name="stars">
              <option value="0">Any</option>
              <option value="1">1*</option>
              <option value="2">2*</option>
              <option value="3">3*</option>
              <option value="4">4*</option>
              <option value="5">5*</option>
            </select>
          </div>
          <div class="price_range">
            <p>
              <label for="amount">Price range:</label>
              <input type="text" id="amount" name="amount" readonly style="border:0; background-color:#f8fafc">
              <input type="hidden" id="hiddenMax" value="{{ $max }}">
            </p>
            <div id="slider-range"></div>
          </div>
          <input type="submit" class="btn btn-primary" value="Show">
        </form>
      </div>
      <script src="slider.js" defer></script>
      <div class="tours d-flex flex-wrap justify-content-center">
        @foreach ($tours as $tour)
          <div class="tour_card m-3 shadow mb-5 bg-white rounded">
            <img src="/images/tours/{{ $tour->image }}" height="250" width="360">
            <ul class="mt-3" style="list-style: none;">
              <li>Name: {{ $tour->name }}</li>
              <li>Type: {{ $tour->type->name }}</li>
              <li>Date: {{ $tour->start_date }}</li>
              <li>Duration: {{ $tour->duration }}</li>
              <li>Num. of people: {{ $tour->people }}</li>
              <li>Price: ${{ $tour->price }}</li>
              <li>
                <a class="btn btn-primary" href="/tours/{{ $tour->id }}">Details</a>
              </li>
            </ul>
          </div>
        @endforeach
    </div>
  </div>

@endsection