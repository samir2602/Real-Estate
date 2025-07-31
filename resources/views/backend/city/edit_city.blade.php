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
                <h6 class="card-title">Edit City</h6>
                <form id="edit_city_form" class="forms-sample" method="POST" action={{ route('update.cities') }}>
                    @csrf
                    <input type="hidden" name="id" value="{{ $city_data->id }}">
                    <div class="form-group mb-3">
                        <label for="city_name" class="form-label">City Name</label>
                        <input type="text" class="form-control @error('city_name') is-invalid @enderror" id="city_name" name="city_name" autocomplete="off" placeholder="City Name" value="{{ $city_data->city_name }}">
                        @error('city_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror                   
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Add City</button>									
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection