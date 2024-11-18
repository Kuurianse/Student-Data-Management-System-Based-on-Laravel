@extends('layouts.layout')

@section('title', 'Login Page')

@section('content')

<h2>Login Page</h2><br>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-start">

                <form action="{{ route('submitLogin') }}" method="post">
                    @csrf

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control mb-2">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control mb-4">

                    <button class="btn btn-primary">Submit</button>

                </form>
                <br>
                @if(session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection