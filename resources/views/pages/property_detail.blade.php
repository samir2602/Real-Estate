@extends('pages.layout')

@section('page_title', $property_data->property_name) 
@section('meta_description', $property_data->property_address)

@section('content')
<div class="row profile-body">    
    <!-- middle wrapper start -->
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <h1>{{ $property_data->property_name }}</h1>
            <div class="col-md-12 grid-margin">
              @if (!empty($property_data->property_image))
              <img src="{{ url('uploads/project_images/'.$property_data->id.'/'.$property_data->property_image) }}" class="property-image">
              @else
              <img src="{{ url('uploads/no_image.jpg') }}" class="property-image">
              @endif
            </div>
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="mt-3">Developed By {{ $developer->developer_name }}</h5>                            
              </div>               
              <div class="card-body">
                <h5 class="mt-3">Property Address</h5>
                <p>{{ $property_data->property_address }}</p>
              </div>
              <div class="card-body">
                <h5 class="mt-3">Property Brochure</h5>
                <a href="{{ url('uploads/project_brochure/'.$property_data->id.'/'.$property_data->property_brochure) }}" target="_blank" class="btn btn-primary">View Brochure</a>
              </div>
              <div class="card-body">
                <h5 class="mt-3">Property Detail</h5>
                {{ $property_data->property_detail }} 
              </div>
              <div class="card-body">
                <h5 class="mt-3">Property Amenities</h5>
                @foreach($amenities as $ame)
                <span class="badge rounded-pill border border-primary text-primary">{{ $ame->amenities_name }}</span>              
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer_content')
<h2>Quick Links</h2>
<div class="row">
    @foreach($property_links as $pl)
    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <a href="{{ url('property/'.$pl['property_slug']) }}" title="{{ $pl['property_name'] }}">{{ $pl['property_name'] }}</a>
    </div>    
    @endforeach
</div>
@endsection