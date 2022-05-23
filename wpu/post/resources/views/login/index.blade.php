@extends('layouts.layout1')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">

        @if(session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('loginError')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center fs-1 mt-5 mb-5">Please Login</h1>

            <form action="/login" method="post">
                @csrf
            <div class="form-floating rounded-top">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Email" required autofocus>
                <label for="floatingInput">Email</label>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-floating rounded-bottom">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                @error('password')
                    {{$message}}
                @enderror
            </div>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
            </form>
            <small class="text-center d-block mt-3">Not registered? <a href="/register">Register Now</a></small>
        </main>
    </div>
</div>

@endsection