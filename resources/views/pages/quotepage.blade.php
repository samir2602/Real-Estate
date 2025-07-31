@extends('pages.layout')

@section('page_title', $quote->quote) 
@section('meta_description', $quote->quote)

@section('content')

<style>
.center-content {
	width:100%;		
  justify-content: center;
  align-items: center;
}

.center-content h1 {
	color: #000;
  font-size: 25px;
	font-family: 'Museo Sans', Avenir, 'Helvetica Neue', Helvetica, sans-serif;
	font-weight: 900;	
	text-align: center;	
	
}

</style>
<div class="row profile-body">    
    <!-- middle wrapper start -->    
    <div class="col-md-12 grid-margin">
      <div class="center-content">  
          <h1>{{ $quote->quote }}</h1>
          <h1>- {{ $quote->quote_by }}</h1>
      </div>
    </div>
</div>          
@endsection