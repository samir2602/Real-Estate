@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">    
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">              
              <div>
                <img class="wd-70 rounded-circle" src="{{ !empty($profiledata->photo) ? url('uploads/admin_images/'.$profiledata->photo) : url('uploads/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3">{{ $profiledata->username }}</span>
              </div>
            </div>
            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
              <p class="text-muted">{{ $profiledata->name }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{ $profiledata->address }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{ $profiledata->email }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted">{{ $profiledata->phone }}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-6 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Edit Admin profile</h6>

								<form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
										<label for="name" class="form-label">UerName</label>
										<input type="text" class="form-control" id="username" name="username" autocomplete="off" placeholder="Username" value="{{ $profiledata->username }}">
									</div>
									<div class="mb-3">
										<label for="name" class="form-label">Name</label>
										<input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Name" value="{{ $profiledata->name }}">
									</div>                  
									<div class="mb-3">
										<label for="email" class="form-label">Email</label>
										<input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email" value="{{ $profiledata->email }}">
									</div>
                  <div class="mb-3">
										<label for="phone" class="form-label">Phone</label>
										<input type="text" class="form-control" id="phone" name="phone" autocomplete="off" placeholder="Phone" value="{{ $profiledata->phone }}">
									</div>
                  <div class="mb-3">
										<label for="address" class="form-label">Address</label>
										<input type="text" class="form-control" id="address" name="address" autocomplete="off" placeholder="Address" value="{{ $profiledata->address }}">
									</div>
                  <div class="mb-3">
										<label class="form-label" for="formFile">Photo</label>
										<input class="form-control" type="file" name="photo" id="image">
									</div>
                  <div class="mb-3">
                    <img id="showimage" class="wd-70 rounded-circle" src="{{ !empty($profiledata->photo) ? url('uploads/admin_images/'.$profiledata->photo) : url('uploads/no_image.jpg')}}" alt="profile">                    
                  </div>

									
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>									
								</form>

              </div>
            </div>
          </div>
          <div class="col-md-12">
            
          </div>
        </div>
      </div>
      <!-- middle wrapper end -->      
    </div>
</div>

<script>
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
         $('#showimage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
@endsection