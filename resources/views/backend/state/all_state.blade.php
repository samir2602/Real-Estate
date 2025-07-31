@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.state') }}" class="btn btn-primary">Add State</a>
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
                        <th>State Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($state as $state_date)
                        <tr>
                            <th>{{ $state_date->id }}</th>
                            <th>{{ $state_date->state_name }}</th>
                            <th>
                                <a href="{{ route('edit.state', $state_date->id) }}" class="btn btn-outline-success">Edit</a>
                                <a href="{{ route('delete.state', $state_date->id) }}" id="delete" class="btn btn-outline-warning">Delete</a>
                            </th>
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
@endsection