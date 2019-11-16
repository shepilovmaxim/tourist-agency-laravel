@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <table class="table">
    <thead>
      <tr align="center">
        <th scope="col">Role</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone number</th>
        <th scope="col">Login</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr align="center">
          <td style="font-weight: bold">{{ $user->role->name }}</td>
          <td>{{ $user->firstName }}</td>
          <td>{{ $user->lastName }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phoneNumber }}</td>
          <td>{{ $user->login }}</td>
          <td>
            <form method="post" action="/admin/users/{{$user->id}}">
            @csrf
              <input type="submit" name="ban" class="btn btn-primary" value="{{ $user->blocked ? 'Unban' : 'Ban' }}">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection