@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">    
    <div class="row profile-body">      
      <div class="col-md-8 col-xl-6 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Add Quote</h6>
                <form id="add_quote_form" class="forms-sample" method="POST" action={{ route('store.quote') }}>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="quote" class="form-label">Quote</label>
                        <input type="text" class="form-control @error('quote') is-invalid @enderror" id="quote" name="quote" autocomplete="off" placeholder="Quote" value="{{ old('quote') }}">
                        @error('quote')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror                   
                    </div>
                    <div class="form-group mb-3">
                        <label for="quote_by" class="form-label">Quote By</label>
                        <input type="text" class="form-control @error('quote_by') is-invalid @enderror" id="quote_by" name="quote_by" autocomplete="off" placeholder="Quote By" value="{{ old('quote_by') }}">
                        @error('quote_by')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror                   
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Add Quote</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection