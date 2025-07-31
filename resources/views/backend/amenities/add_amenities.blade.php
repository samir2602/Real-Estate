@extends('admin.admin_dashboard');

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
                <h6 class="card-title">Add Amenities</h6>
                <form id="add_amenities_form" class="forms-sample" method="POST" action="{{ route('store.amenities') }}" enctype="multipart/form-data">
                @csrf             
                <div class="form-group mb-3">
                    <label for="amenities_name" class="form-label">Amenities Name</label>
                    <input type="text" class="form-control" id="amenities_name" name="amenities_name" autocomplete="off" placeholder="Amenities Name" value="{{ old('amenities_name') }}">                    
                </div>                
                <button type="submit" class="btn btn-primary me-2">Save Changes</button>									
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            
          </div>
        </div>
      </div>
      <!-- middle wrapper end -->      
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function (){
      $('#add_amenities_form').validate({
          rules: {
            amenities_name: {
                  required : true,
              }, 
              
          },
          messages :{
              amenities_name: {
                  required : 'Please Enter Amenities Name',
              }, 
               

          },
          errorElement : 'span', 
          errorPlacement: function (error,element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
          },
          highlight : function(element, errorClass, validClass){
              $(element).addClass('is-invalid');
          },
          unhighlight : function(element, errorClass, validClass){
              $(element).removeClass('is-invalid');
          },
      });
  });
  
</script>

@endsection