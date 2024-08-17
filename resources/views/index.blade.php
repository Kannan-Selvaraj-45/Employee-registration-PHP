@extends('layouts.app')
@section('main')
{{-- @dd($employees) --}}
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"> 
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <strong class="h5">Employee List</strong>
                    <a href="{{ route('create-employee') }}" class="btn btn-primary btn-sm">Create Employee</a>
                </div>
                <table class="table table-responsive table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joining Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $index => $employee)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->joining_date }}</td>
                            <td>
                                <span class="badge {{ $employee->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $employee->is_active ? 'Active!!' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('show-employee', $employee->id) }}" class="btn btn-info btn-sm">Show</a>
                                    <a href="{{ route('edit-employee', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('destroy-employee', $employee->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
