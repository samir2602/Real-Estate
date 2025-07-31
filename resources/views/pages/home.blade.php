@extends('pages.layout')

@section('page_title', 'Home page')
@section('meta_description', 'Discover your dream property with Real Estate for you. Explore a wide range of residential and commercial properties for sale or rent, offering great deals and expert guidance. Start your property search today!')

@section('content')
    @foreach($properties as $data)
    <div class="row mt-5 p-3"  style="border:1px solid #000; border-radius:10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
        @if ($data['property_image'] != '')          
          <a href="{{ route('show.property', $data['property_slug']) }}" target="_blank"><img src="{{ url('uploads/project_images/'.$data['id'].'/'.$data['property_image']) }}" class="property-image"></a>
        @else
          <a href="{{ route('show.property', $data['property_slug']) }}" target="_blank"><img src="{{ url('uploads/no_image.jpg') }}" class="property-image"></a>
        @endif
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
        <h3><a href="{{ route('show.property', $data['property_slug']) }}" target="_blank">{{ $data['property_name'] }}</a></h3>
        <p>{{ $data['property_address'] }}</p>
        <p>{{ $data['property_city'] }}</p>
      </div>  
    </div>
    @endforeach
    {{ $properties->links('pagination::bootstrap-5') }}
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