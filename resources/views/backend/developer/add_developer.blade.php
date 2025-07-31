@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">    
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-6 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Add Developer</h6>
                <form id="add_property_form" class="forms-sample" method="POST" action="{{ route('store.developer') }}" enctype="multipart/form-data">
                @csrf             
                <div class="form-group mb-3">
                    <label for="developer_name" class="form-label">Developer Name</label>
                    <input type="text" class="form-control @error('developer_name') is-invalid @enderror" id="developer_name" name="developer_name" autocomplete="off" placeholder="Property Name" value="{{ old('developer_name') }}">
                    @error('developer_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror                   
                </div>
                <div class="form-group mb-3">
                    <label for="developer_contact" class="form-label">Developer Contact</label>
                    <input type="number" class="form-control @error('developer_contact') is-invalid @enderror" id="developer_contact" name="developer_contact" autocomplete="off" placeholder="Property Contact" value="{{ old('developer_contact') }}">
                    @error('developer_contact')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="developer_email" class="form-label">Developer Email</label>
                    <input type="email" class="form-control @error('developer_email') is-invalid @enderror" id="developer_email" name="developer_email" autocomplete="off" placeholder="Property Email" value="{{ old('developer_email') }}">
                    @error('developer_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="developer_image" class="form-label">Developer Image</label>
                    <input class="form-control" type="file" name="developer_image" id="developer_image">
                </div>
                <button type="submit" class="btn btn-primary me-2">Add Developer</button>	
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- middle wrapper end -->      
    </div>
  </div>
</div>
@endsection