@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.cities') }}" class="btn btn-primary">Add City</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All Cities</h6>                    
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>City Name</th>                                                
                        <th>Action</th>                  
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->city_name }}</td>
                            <td>
                                <a href="{{ route('edit.cities', $city->id) }}" class="btn btn-outline-primary">Edit</a>
                                <a href="{{ route('delete.cities', $city->id) }}" id="delete" class="btn btn-outline-warning">Delete</a>
                            </td>
                            <td></td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection;