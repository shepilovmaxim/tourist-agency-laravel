@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <table class="table">
    <thead>
      <tr align="center">
        <th scope="col">User</th>
        <th scope="col">Tour</th>
        <th scope="col">Status</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($vouchers as $voucher)
        <tr align="center">
          <td>{{ $voucher->user->firstName }} {{ $voucher->user->lastName }}</td>
          <td><a href="/tours/{{$voucher->tour->id}}">{{ $voucher->tour->name }}</a></td>
          <td>{{ $voucher->status->name }}</td>
          <td>{{ $voucher->tour->price }}</td>
          @if ($voucher->status->id == 1)
            <td class="set_status">
              Set status:
              <form action="/admin/vouchers/{{$voucher->id}}/11" method="POST" style="display: inline-block">
              @csrf
              @method('PUT')
                <input type="submit" class="btn btn-primary" value="Paid">
              </form>
              <form action="/admin/vouchers/{{$voucher->id}}/21" method="POST" style="display: inline-block">
              @csrf 
              @method('PUT')
                <input type="submit" class="btn btn-primary" value="Canceled">
              </form>
            </td>
          @else
            <td></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection