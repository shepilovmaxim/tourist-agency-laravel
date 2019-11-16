@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-around">
  <table class="table table-borderless">
    <tbody>
      <tr align="center">
        <th scope="col">Role:</td>
        <td>{{ auth()->user()->role->name }}</td>
      </tr>
      <tr align="center">
        <th scope="col">First name:</td>
        <td>{{ auth()->user()->firstName }}</td>
      </tr>
      <tr align="center">
        <th scope="col">Last name:</td>
        <td>{{ auth()->user()->lastName }}</td>
      </tr>
      <tr align="center">
        <th scope="col">Email:</td>
        <td>{{ auth()->user()->email }}</td>
      </tr>
      <tr align="center">
        <th scope="col">Phone number:</td>
        <td>{{ auth()->user()->phoneNumber }}</td>
      </tr>
      <tr align="center">
        <th scope="col">Login:</td>
        <td>{{ auth()->user()->login }}</td>
      </tr>
      @if (auth()->user()->blocked == 1)
        <tr align="center">
          <td><span style="font-weight: bold">Status:</span></td>
          <td><span style="font-weight: bold">Blocked</span></td>
        </tr>
      @endif
    </tbody>
  </table>
  <table class="table">
    <thead>
      <tr align="center">
        <th>Tour</th>
        <th>Price</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach (auth()->user()->voucher as $voucher) 
        <tr align="center" class="table_row">
          <td><a href="/tours/{{$voucher->tour->id}}">{{ $voucher->tour->name }}</a></td>
          <td>{{ $voucher->tour->price }}</td>
          <td>{{ $voucher->status->name }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection