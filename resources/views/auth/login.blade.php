<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs Finder</title>
    <link rel="website icon" type="" href="{{ asset('dist/img/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/login.css') }}">
</head>

<body class="login-page">

    <center>
        {{-- Alert --}}
        <div class="col-sm-4">
            @if (session("text"))
            <div id="alertMessage" class="alert alert-{{ session("type") }} text-center" style="color:white; background-color:#343a40; padding:20px; border-radius:10px; margin-bottom:15px;"
                role="alert">
                {{ session("text") }}
            </div>
            @endif
        </div>
        {{-- End Alert --}}
    </center>
    <div id="login">
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form action="{{ url('auth/login') }}" method="post">
                    @csrf
                    <h1>Sign in</h1>
                    <input autocomplete="off" type="name" placeholder="Name" name="name" id="name" />
                    <input type="password" placeholder="Password" name="password" id="password" />
                    <a href="#">Forgot your password?</a>
                    <button>Sign In</button>
                </form>
            </div>
            <div class="form-container sign-up-container">
                <form action="{{ route("signup") }}" method="post">
                    @csrf
                    <h1>Sign Up</h1>
                    <input autocomplete="off" type="text" placeholder="Name" name="name" id="name" required />

                    <input autocomplete="off" type="email" placeholder="Email" name="email" id="email" required />

                    <input autocomplete="off" type="password" placeholder="Password" name="password" id="inputpassword"
                    required />

                    <button>Sign Up</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h2>Register</h2>
                        <p>don't have account yet</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                    <div class="overlay-panel overlay-left">
                        <h2>Login</h2>
                        <p>already have an account</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist/js/login.js') }}"></script>
</body>
