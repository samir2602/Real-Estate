@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">    
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-6 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit Developer</h6>
                <form id="edit_property_form" class="forms-sample" method="POST" action="{{ route('update.developer') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $developer_data->id}}">
                <div class="form-group mb-3">
                    <label for="developer_name" class="form-label">Developer Name</label>
                    <input type="text" class="form-control @error('developer_name') is-invalid @enderror" id="developer_name" name="developer_name" autocomplete="off" placeholder="Property Name" value="{{ $developer_data->developer_name }}">
                    @error('developer_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror                   
                </div>
                <div class="form-group mb-3">
                    <label for="developer_contact" class="form-label">Developer Contact</label>
                    <input type="number" class="form-control @error('developer_contact') is-invalid @enderror" id="developer_contact" name="developer_contact" autocomplete="off" placeholder="Property Contact" value="{{ $developer_data->developer_contact }}">
                    @error('developer_contact')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="developer_email" class="form-label">Developer Email</label>
                    <input type="email" class="form-control @error('developer_email') is-invalid @enderror" id="developer_email" name="developer_email" autocomplete="off" placeholder="Property Email" value="{{ $developer_data->developer_email }}">
                    @error('developer_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="developer_image" class="form-label">Developer Image</label>
                    <input class="form-control" type="file" name="developer_image" id="developer_image">
                </div>
                <div class="mb-3">
                    <img id="showimage" class="wd-70 rounded-circle" src="{{ !empty($developer_data->developer_image) ? url('uploads/developer_image/'.$developer_data->id.'/'.$developer_data->developer_image) : url('uploads/no_image.jpg') }}" alt="Developer">
                </div>
                <button type="submit" class="btn btn-primary me-2">Update Developer</button>	
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- middle wrapper end -->      
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('#developer_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection