@extends('admin.main_layout')
@section('admin')


<div class="container">
  <div class="card" style="width: 18rem;">
    <img src="{{ (!empty($adminData->profile_photo_path)) ? url('uploads/admin_images/'.$adminData->profile_photo_path) : url('uploads/no_image.jpg') }}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">Name : {{ $adminData->name }}</h5>
      <p class="card-text">Email : {{ $adminData->email }}</p>
      <a href="{{ route('admin.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>

@endsection