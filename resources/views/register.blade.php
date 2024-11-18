@extends('layouts.layout')

@section('title', 'Register Page')

@section('content')

<h2>Register Page</h2>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-start">

                <form action="{{ route('submitRegistration') }}" method="post">
                    @csrf

                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control mb-2">

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control mb-2">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control mb-4">

                    <button class="btn btn-primary">Submit</button>

                </form>
                
            </div>
        </div>
    </div>
</div>
</div>

@endsection