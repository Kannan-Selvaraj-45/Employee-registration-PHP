@extends('layouts.app')
@section('main') 

<div class="m-3">
    <a href="{{ route('index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left-circle"></i> Go Back Indian
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <p class="h4 mb-4 font-weight-bold text-primary">Update Employee</p>
        <form action="{{ route('update-employee', $employee) }}" class="was-validated" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$employee->name}}" required>
                @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
                @endif
            </div>

            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$employee->email}}" required>
                @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
                @endif
            </div>

            <div class="mb-3 form-group">
                <label for="joining_date" class="form-label">Joining Date</label>
                <input type="date" name="joining_date" id="joining_date" class="form-control {{$errors->has('joining_date') ? 'is-invalid' : ''}}" value="{{$employee->joining_date}}" required>
                @if ($errors->has('joining_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('joining_date') }}</strong>
                </div>
                @endif
            </div>

            <div class="mb-3 form-group">
                <label for="joining_salary" class="form-label">Joining Salary</label>
                <input type="number" name="joining_salary" id="joining_salary" class="form-control {{$errors->has('joining_salary') ? 'is-invalid' : ''}}" value="{{$employee->joining_salary}}" required>
                @if ($errors->has('joining_salary'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('joining_salary') }}</strong>
                </div>
                @endif
            </div>

            <div class="mb-4 form-group">
                <div class="form-check">
                    <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" {{$employee->is_active == 1 ? 'checked' : ''}}>
                    <label for="is_active" class="form-check-label">Active</label>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update Employee
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
