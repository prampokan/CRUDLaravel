@extends('app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="d-flex flex-column">
        <div class="d-flex flex-column border rounded p-3">
            @if (session('success'))
                <p class="alert alert-primary">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            {{-- <h2 class="text-center fw-bold text-uppercase">data manager</h2> --}}
            <h5 class="text-center text-bold text-uppercase">{{ $title }}</h5>
            <form method="POST" action="{{ route('login.action') }}">
                @csrf
                <div class="d-flex flex-column">
                    <label class="mb-2">Username <span class="text-danger"></span></label>
                    <input type="text" placeholder="username"class="form-control" name="username" value="{{ old('username') }}" id="input1">
                </div>
                <div class="d-flex flex-column mt-2">
                    <label class="mb-2">Password <span class="text-danger"></span></label>
                    <input type="password" placeholder="password" class="form-control" name="password" id="input2">
                </div>
                <div class="d-flex flex-column mt-3">
                    <button class="btn btn-primary fw-bold mb-2" id="submitButton">Log in</button>
                    <a href="{{ route('register') }}" class="btn btn-dark">don't have an account? register here</a>
                </div>  
            </form>

        </div>
    </div>
</div>
@endsection