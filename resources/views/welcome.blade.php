<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-4">Welcome to Employee Management System</h1>
    <p class="lead">Manage your employees efficiently!</p>
    <div class="row justify-content-center">
        <div class="col-md-5 mb-3">
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg btn-block mb-2">Login</a>
        </div>
        <div class="col-md-5 mb-3">
            <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg btn-block">Register</a>
        </div>
    </div>
</div>
@endsection
