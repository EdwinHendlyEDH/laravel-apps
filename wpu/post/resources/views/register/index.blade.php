@extends('layouts.layout1')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center fs-1 mt-5 mb-5">Registration Form</h1>
 
            <form action="/register" method="post">
                @csrf
            <div class="form-floating rounded-top">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{old('name')}}">
                <label for="name">Name</label>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{old('username')}}">
                <label for="username">Username</label>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    @error('username')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required value="{{old('email')}}">
                <label for="floatingInput">Email address</label>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-floating border-bottom">
                <input type="password" name='password' class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Register</button>
            </form>
            <small class="text-center d-block mt-3">Already have account? <a href="/login">Login Now</a></small>
        </main>
    </div>
</div>

@endsection