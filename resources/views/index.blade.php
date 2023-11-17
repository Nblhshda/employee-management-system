<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Welcome to Employee Management</h1>
        <div class="mt-5">
            <a href="{{ route('employees.index') }}" class="btn btn-primary btn-lg mx-3">View Employees</a>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary btn-lg mx-3">View Departments</a>
        </div>
    </div>
@endsection

