@extends('app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="d-flex flex-column border rounded p-3">
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif
        {{-- <h1 class="text-center fw-bold text-uppercase">login & registration</h1> --}}
        <h5 class="text-center text-uppercase text-bold">{{ $title }}</h5>
        <div class="d-flex flex-column">
            <form method="POST" action="{{ route('register.action') }}">
                @csrf
                <div class="d-flex flex-column">
                    <label class="mb-2">Name <span class="text-danger"></span></label>
                    <input type="text" placeholder="name" class="form-control"  name="name" value="{{ old('name') }}">
                </div>
                <div class="d-flex flex-column mt-2">
                    <label class="mb-2">Username <span class="text-danger"></span></label>
                    <input type="text" placeholder="username" class="form-control"  name="username" value="{{ old('username') }}">
                </div>
                <div class="d-flex flex-column mt-2">
                    <label class="mb-2">Email <span class="text-danger"></span></label>
                    <input type="text" placeholder="email" class="form-control"  name="email" value="{{ old('email') }}">
                </div>
                <div class="d-flex flex-column mt-2">
                    <label class="mb-2">Password <span class="text-danger"></span></label>
                    <input type="password" placeholder="password" class="form-control"  name="password">
                </div>
                <div class="d-flex flex-column mt-2">
                    <label class="mb-2">Password Confirmation <span class="text-danger"></span></label>
                    <input type="password" placeholder="password" class="form-control"  name="password_confirmation">
                </div>
                <div class="d-flex flex-column mt-3">
                    <button class="btn btn-primary mb-2" id="submitButton">Register</button>
                    <a href="{{ route('login') }}" class="btn btn-dark mb-2">already have an account? log in here</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection