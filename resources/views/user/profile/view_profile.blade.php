@extends('user.main_layout')
@section('user_main')


<div class="container">
  <div class="card" style="width: 18rem;">
    <img src="{{ (!empty($user->profile_photo_path)) ? url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg') }}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">Name : {{ $user->name }}</h5>
      <p class="card-text">Email : {{ $user->email }}</p>
      <a href="{{ route('user.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>

@endsection('user_main')