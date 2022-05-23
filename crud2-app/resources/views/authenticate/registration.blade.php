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
    <h1>Registration Form</h1>
    <form action="/registration" method="post">
        @csrf
        <ul>
            <li>
                <label for='username'>Username </label>
                <input type='text' name='username' id='username' required style="@error('username') border: 1px solid red @enderror" value="{{old('username')}}">

                @error('username')
                    <div class="error_info">
                        {{$message}}
                    </div>
                @enderror
            </li>

            <li>
                <label for='email'>Email </label>
                <input type='email' name='email' style="@error('email') border: 1px solid red @enderror" id='email' required value="{{old('email')}}">

                @error('email')
                    <div class="error_info">
                        {{$message}}
                    </div>
                @enderror
            </li>

            <li>
                <label for='password'>Password </label>
                <input type='password' name='password' style="@error('password') border: 1px solid red @enderror" id='password' required>

                @error('password')
                    <div class="error_info">
                        {{$message}}
                    </div>
                @enderror
            </li>
            <li>
                <button type="submit">Registrate</button>
            </li>

        </ul>
    </form>
</body>
</html>