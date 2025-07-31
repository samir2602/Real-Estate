@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.properties') }}" class="btn btn-primary">Add Properties</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">Properties All</h6>                    
                <div class="table-responsive">
                <table class="property_table table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Property Name</th>
                        <th>Property Address</th>
                        <th>Property City</th>                        
                        <th>Property Image</th>                        
                        <th>Action</th>                  
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection