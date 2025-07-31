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
              <h6 class="card-title">Add Property</h6>
              <form id="add_property_form" class="forms-sample" method="POST" action="{{ route('store.properties') }}" enctype="multipart/form-data">
              @csrf             
              <div class="form-group mb-3">
                <label for="property_name" class="form-label">Property Name</label>
                <input type="text" class="form-control @error('property_name') is-invalid @enderror" id="property_name" name="property_name" autocomplete="off" placeholder="Property Name" value="{{ old('property_name') }}">
                @error('property_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror                   
              </div>
              <div class="form-group mb-3">
                <label for="property_brochure" class="form-label">Property Brochure</label>
                <input class="form-control" type="file" name="property_brochure" id="property_brochure">
              </div>
              <div class="form-group mb-3">
                <label for="property_detail" class="form-label">Property Detail</label>
                <textarea class="form-control" name="property_detail" id="easyMdeExample" rows="10">{{ old('property_detail') }}</textarea>                    
              </div>
              <div class="form-group mb-3">
                  <label for="property_address" class="form-label">Property Address</label>
                  <input type="text" class="form-control @error('property_address') is-invalid @enderror" id="property_address" name="property_address" autocomplete="off" placeholder="Property Address" value="{{ old('property_address') }}">
                  @error('property_address')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Property Possession:</label>
                <input class="form-control mb-4 mb-md-0" id="property_possession" name="property_possession" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" inputmode="numeric" value="{{ old('property_possession') }}">
              </div>
              <div class="mb-3">
                <label for="property_city" class="form-label">Property City</label>
                <select class="form-select" name="property_city" id="property_city">
                  <option value="">Select property city</option>
                  @foreach ($city as $city_data)
                  <option value="{{ $city_data->city_name }}" {{ old('property_city') == $city_data->city_name ? 'selected' : '' }}>{{ $city_data->city_name }}</option>
                  @endforeach
                </select>
                @error('property_city')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="property_developer" class="form-label">Property Developer</label>
                <select class="form-select" name="property_developer" id="property_developer">
                  <option value="">Select Property Developer</option>
                  @foreach($developer as $dvlp_data)
                  <option value="{{ $dvlp_data->id }}" {{ old('property_developer') == $dvlp_data->id ? 'selected' : '' }}>{{ $dvlp_data->developer_name}}</option>
                  @endforeach
                </select>
                @error('property_developer')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="property_amenities" class="form-label">Property Amenities</label>
                <br>
                @foreach($amenities as $amen)
                <input type="checkbox" name="property_amenities[]" class="btn-check" id="amenities_{{$amen->id}}" value="{{$amen->id}}" autocomplete="off">
                <label class="btn btn-outline-primary" for="amenities_{{$amen->id}}">{{$amen->amenities_name}}</label>                
                @endforeach
              </div>
              <div class="mb-3">
                <label for="property_type" class="form-label">Property Type</label>
                <br>
                @foreach($property_type as $pt)
                <input type="checkbox" name="property_type[]" class="btn-check" id="type_{{$pt->id}}" value="{{$pt->id}}" autocomplete="off">
                <label class="btn btn-outline-primary" for="type_{{$pt->id}}">{{$pt->type_name}}</label>                
                @endforeach
              </div>
              <div class="form-group mb-3">
                  <label for="property_image" class="form-label">Property Image</label>
                  <input class="form-control" type="file" name="property_image" id="property_image">
              </div>
              <button type="submit" class="btn btn-primary me-2">Add Property</button>									
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->      
  </div>
</div>
@endsection