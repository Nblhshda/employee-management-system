@extends('layouts.app') <!-- Assuming you have a layout named 'app' -->

@section('content')
<div class="container">
    <h1>Employees</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-success">Create New Employee</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($employees) && $employees->isNotEmpty())
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->department->name }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No employees found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
