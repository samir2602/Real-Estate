@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.developer') }}" class="btn btn-primary">Add Developer</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All Developer</h6>                    
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Developer Name</th>
                        <th>Developer Contact</th>    
                        <th>Developer Email</th>
                        <th>Developer Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($developer as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->developer_name }}</td>
                            <td>{{ $data->developer_contact }}</td>
                            <td>{{ $data->developer_email }}</td>                            
                            <td>
                                <img src="{{ url('uploads/developer_image/'.$data->id.'/'.$data->developer_image) }}" style="widtd:50%; height:auto;">
                            </td>
                            <td>
                                <a href="{{ route('edit.developer', $data->id) }}" class="btn btn-outline-primary">Edit</a>
                                <a href="{{ route('delete.developer', $data->id)}}" id="delete" class="btn btn-outline-warning">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection