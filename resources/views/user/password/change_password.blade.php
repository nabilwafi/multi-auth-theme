@extends('user.main_layout')
@section('user_main')

<div class="container py-5">
  <form action="{{ route('user.update.password') }}" method="POST">
  @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Current Password</label>
      <input type="password" class="form-control" name="current_password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Confirmation" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

@endsection