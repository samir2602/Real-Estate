<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('/') }}" class="sidebar-brand">
          Real<span>Estate</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route ('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Real Estate</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property_type" role="button" aria-expanded="false" aria-controls="property_type">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Type</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property_type">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.type') }}" class="nav-link">Add Type</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false" aria-controls="amenities">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Amenities</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenities">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.amenities') }}" class="nav-link">All Amenities</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.amenities') }}" class="nav-link">Add Amenities</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#developer" role="button" aria-expanded="false" aria-controls="developer">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Developer</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="developer">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.developer') }}" class="nav-link">All Developer</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.developer') }}" class="nav-link">Add Developer</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="property">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.properties') }}" class="nav-link">All Properties</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.properties')}}" class="nav-link">Add Property</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#city" role="button" aria-expanded="false" aria-controls="city">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">City</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="city">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.cities') }}" class="nav-link">All Cities</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.cities')}}" class="nav-link">Add Cities</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="state">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">State</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="state">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.state') }}" class="nav-link">All State</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.state') }}" class="nav-link">Add State</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#quote" role="button" aria-expanded="false" aria-controls="state">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Quote</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="quote">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.quote') }}" class="nav-link">All Quotes</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.quote') }}" class="nav-link">Add Quote</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Calendar</span>
            </a>
          </li>         
        </ul>
    </div> 
</nav>
<nav class="settings-sidebar">
		<div class="sidebar-body">
		<a href="#" class="settings-sidebar-toggler">
  		<i data-feather="settings"></i>
		</a>
    	<div class="theme-wrapper">
      		<h6 class="text-muted mb-2">Light Theme:</h6>
      		<a class="theme-item" href="../demo1/dashboard.html">
        		<img src="../assets/images/screenshots/light.jpg" alt="light theme">
      		</a>
      		<h6 class="text-muted mb-2">Dark Theme:</h6>
      		<a class="theme-item active" href="../demo2/dashboard.html">
        		<img src="../assets/images/screenshots/dark.jpg" alt="light theme">
      		</a>
    	</div>
		</div>
</nav>