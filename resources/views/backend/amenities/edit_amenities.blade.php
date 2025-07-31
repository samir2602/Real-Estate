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
                <h6 class="card-title">Edit Amenities</h6>
                <form id="add_amenities_form" class="forms-sample" method="POST" action="{{ route('update.amenities')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $amenities->id }}" name="id">
                <div class="form-group mb-3">
                    <label for="amenities_name" class="form-label">Amenities Name</label>
                    <input type="text" class="form-control" id="amenities_name" name="amenities_name" autocomplete="off" placeholder="Amenities Name" value="{{ $amenities->amenities_name }}">
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