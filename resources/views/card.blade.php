@extends('layouts.app')

@section('content')

<div class="fullscreen_card">
  <form enctype="multipart/form-data" id="edit_form" method="post">
  @csrf
  @method('PUT')
    <div class="image_block d-flex flex-wrap justify-content-around align-items-center">
      <div class="tour_part">
        <h2>Tour: 
          <input class="edit d-none" name="name" style="width: 150px;"/> 
          <span class="property_value">{{ $tour->name }}</span>
        </h2>
        <img src="/images/tours/{{ $tour->image }}" style="height: 450px; width: 675px;">
      </div>
      <div class="hotel_part">
        <h2>Hotel: {{ $tour->hotel->name }} {{ $tour->hotel->stars }}*</h2>
        <img src="/images/hotels/{{ $tour->hotel->image }}" style="height: 450px; width: 675px;">
      </div>
    </div>
    <div class="information d-flex justify-content-around px-3 pt-3">
      <div>
        <span class="property_name">Type:</span> 
        <select class="edit d-none" name="type_id" style="width: 150px;">
          <option value="1">Vacation</option>
          <option value="2">Excursion</option>
          <option value="3">Shopping</option>
        </select>
        <span class="property_value">{{ $tour->type->name }}</span>
      </div>
      <div>
        <span class="property_name">Duration:</span>
        <input class="edit d-none" name="duration" style="width: 75px;"/>
        <span class="property_value">{{ $tour->duration }}</span>
      </div>
      <div>
        <span class="property_name">Num. of people:</span>
        <select class="edit d-none" name="people" style="width: 75px;">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <span class="property_value">{{ $tour->people }}</span>
      </div>
      <div>
        <span class="property_name">Price:</span>
        <input class="edit d-none" name="price" style="width: 75px;"/> 
        $<span class="property_value">{{ $tour->price }}</span>
      </div>
      <div>
        <span class="property_name">Amount:</span>
        <input class="edit d-none" name="amount" style="width: 75px;"/> 
        <span class="property_value">{{ $tour->amount }}</span>
      </div>
      <div>
        <span class="property_name">Start date:</span>
        <input type="date" class="edit d-none" name="start_date" style="border: 1px solid rgb(169, 169, 169); width: 150px;"/> 
        <span class="property_value">{{ $tour->start_date }}</span>
      </div>
    </div>
    <div class="description py-3 d-flex justify-content-center">
      <textarea class="edit d-none" name="description" style="resize: none; text-align: center; width:1700px;"></textarea>
      <p style="text-align: center; height: auto;">
        <span class="property_value" style="display:block; width:1700px;">{{ $tour->description }}</span>
      </p>
    </div>
    @auth
      <div class="error_container"></div>
      <div class="d-flex justify-content-center">
        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 21)
          <button class="btn btn-primary" id="edit_button">Edit</button>
          <button type="submit" class="btn btn-primary d-none m-1" id="save" id="submit_button">Save</button>
        @endif
      </div>
    @endauth
  </form>
  @auth
    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 21)
      <form method="POST" action="{{route('tours.destroy', $tour->id)}}" class="d-flex justify-content-center">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-primary d-none m-1" id="delete_button" value="Delete tour">
      </form>
      <script src="/edit.js"></script>
    @elseif (Auth::user()->blocked == 0)
      <form method="POST" action="{{route('tours.order', $tour->id)}}" class="d-flex justify-content-center">
        @csrf
        <button type="submit" class="btn btn-primary" id="order_button">Order</button>
      </form>
    @endif
  @endauth
</div>

@endsection