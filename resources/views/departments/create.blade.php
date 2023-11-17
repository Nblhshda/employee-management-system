<!-- resources/views/departments/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Department</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
