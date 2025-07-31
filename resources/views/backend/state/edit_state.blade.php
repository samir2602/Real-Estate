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
                <h6 class="card-title">Add State</h6>
                <form id="add_state_form" class="forms-sample" method="POST" action="{{ route('update.state') }}"> 
                    @csrf
                    <input type="hidden" value="{{ $state_data->id }}" name="id">
                    <div class="form-group mb-3">
                        <label for="state_name" class="form-label">State Name</label>
                        <input type="text" class="form-control @error('state_name') is-invalid @enderror" id="state_name" name="state_name" autocomplete="off" placeholder="State Name" value="{{ $state_data->state_name }}">
                        @error('state_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Add State</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection