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
                <h6 class="card-title">Edit Property Type</h6>
                <form class="forms-sample" method="POST" action="{{ route('update.type') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $types->id}}" name="id">
                <div class="mb-3">
                    <label for="name" class="form-label">Type Name</label>
                    <input type="text" class="form-control @error('type_name') is-invalid @enderror" id="type_name" name="type_name" autocomplete="off" placeholder="Type Name" value="{{ $types->type_name }}">
                    @error('type_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Type Icon</label>
                    <input type="text" class="form-control @error('type_icon') is-invalid @enderror" id="type_icon" name="type_icon" autocomplete="off" placeholder="Type Icon" value="{{ $types->type_icon }}">
                    @error('type_icon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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

@endsection