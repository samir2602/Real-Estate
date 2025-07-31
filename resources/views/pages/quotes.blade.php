@extends('pages.layout')

@section('page_title', 'Quotes For You')

@section('meta_description', 'Quotes For You')

@section('content')
<div class="row">
@foreach($quotes as $quote)
<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-5">
    <div class="center-content p-3" style="box-shadow: 5px 5px 10px; border-radius: 10px;">  
        <a href="{{ url('quote/'.$quote->quote_slug) }}" target="_blank"><h1>{{ $quote->quote }}</h1></a>
        <h1>- {{ $quote->quote_by }}</h1>
    </div>
</div>
@endforeach
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5">
    {{ $quotes->links('pagination::bootstrap-5') }}
</div>
</div>
@endsection