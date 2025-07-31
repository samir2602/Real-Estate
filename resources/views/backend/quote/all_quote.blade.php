@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.quote') }}" class="btn btn-primary">Add Quote</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All Quotes</h6>                    
                <div class="table-responsive">
                <table class="quote_table table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Quote</th>
                        <th>Quote By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($quote as $qt)
                        <tr>
                            <td>{{ $qt->id }}</td>
                            <td>{{ $qt->quote }}</td>
                            <td>{{ $qt->quote_by }}</td>
                            <td>
                                <a href="{{ route('show.quote', $qt->quote_slug) }}" target="_blank" class="btn btn-outline-primary">Show</a>
                                <a href="{{ route('edit.quote', $qt->id) }}" class="btn btn-outline-primary">Edit</a>
                                <a href="{{ route('delete.quote', $qt->id) }}" id="delete" class="btn btn-outline-warning">Delete</a>
                            </td>
                            <td></td>
                        </tr>
                        @endforeach() --}}
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection