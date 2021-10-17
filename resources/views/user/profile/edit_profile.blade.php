@extends('user.main_layout')
@section('user_main')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<div class="container row" style="padding-top: 3rem;">
  <div class="col-md-6">
    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $userData->name }}">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputPassword1" value="{{ $userData->email }}">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Upload Image</label>
        <input class="form-control" type="file" id="image" name="profile_photo_path">
      </div>
      <div class="mb-3">
      <img id="showImage" style="height: 100px; width:100px;" src="{{ (!empty($userData->profile_photo_path)) ? url('uploads/user_images/'.$userData->profile_photo_path) : url('uploads/no_image.jpg') }}" />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(e) {
    $('#image').change(function(e) {
      let reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endsection('user_main')