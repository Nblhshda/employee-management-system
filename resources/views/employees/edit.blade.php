@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit Employee</h1>

  <form action="{{ route('employees.update', $employee) }}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" placeholder="Enter employee name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" placeholder="Enter employee email">
      @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter employee password">
      @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="department_id">Department:</label>
      <select class="form-control" id="department_id" name="department_id">
        @foreach ($departments as $department)
          <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
