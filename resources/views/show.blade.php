@extends('layouts.app')
@section('main')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <p class="h4 mb-4 font-weight-bold text-primary">Employee Details</p>
        
        <div class="mb-3 form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ $employee->name }}" readonly>
        </div>

        <div class="mb-3 form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $employee->email }}" readonly>
        </div>

        <div class="mb-3 form-group">
            <label for="joining_date" class="form-label">Joining Date</label>
            <input type="date" class="form-control" value="{{ $employee->joining_date }}" readonly>
        </div>

        <div class="mb-3 form-group">
            <label for="joining_salary" class="form-label">Joining Salary</label>
            <input type="number" class="form-control" value="{{ $employee->joining_salary }}" readonly>
        </div>

        <div class="mb-4 form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" {{ $employee->is_active == 1 ? 'checked' : '' }} readonly>
                <label for="is_active" class="form-check-label">Active</label>
            </div>
        </div>
        
        <a href="{{ route('index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
    </div>
</div>
@endsection
