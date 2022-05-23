<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Login Form</h1>
    @if(session()->has('registrationSuccess'))
        <h3 style="color: green; font-style: italic; margin-bottom: 1rem;">{{session('registrationSuccess')}}</h3>
    @endif

    @if(session()->has('loginError'))
        <h3 style="color: red; font-style: italic; margin-bottom: 1rem;">{{session('loginError')}}</h3>
    @endif


    <form action="/login" method="post">
        @csrf
        <ul>
            <li>
                <label for='username'>Username </label>
                <input type='text' name='username' id='username' required autofocus value="{{old('username')}}">

                @error('username')
                    <div class="error_info">
                        {{$message}}
                    </div>
                @enderror
            </li>

            <li>
                <label for='password'>Password </label>
                <input type='password' name='password' id='password' required>

                @error('password')
                    <div class="error_info">
                        {{$message}}
                    </div>
                @enderror
            </li>
            <li>
                <button type="submit">Login</button>
            </li>

        </ul>
    </form>
</body>
</html>