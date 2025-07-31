<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <title>@Yield('page_title') - Real Estate | Property in mumbai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@Yield('page_title') - @Yield('meta_description')">
    <link rel="icon" type="image/x-icon" href="{{ url('uploads/site_images/site_favicon.jpg') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/front_side.css') }}" >
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="google-adsense-account" content="ca-pub-3136610734572371">
</head>
<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Real Estate For You</span>
        </a>
        
        <ul class="nav nav-pills">
            {{-- <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li> --}}
        </ul>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer class="mt-5 p-3 text-center">
        <div style="margin:20px 0;">
            <a href="https://www.indiacrank.com/" target="_blank" class="text-center" style="background: red; padding: 10px 20px; margin: 10px 3px !important; border-radius: 10px; color: #FFF;">                
                Visit sponsor site
            </a>
            <a href="{{ route('quote') }}" target="_blank" class="text-center" style="background: red; padding: 10px 20px; margin: 10px 3px !important; border-radius: 10px; color: #FFF;">                
                Quotes Page
            </a>
        </div>
        @yield('footer_content')
    </footer>
    <script src="{{ asset('backend/assets/js/code/code.js')}}"></script>
</body>
</html>