{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
    <title>People API</title>
    <style>

        body{
            background: linear-gradient(
                to right, purple,
                red, rgb(162, 255, 0));
                background-size: 400% 400%;
                animation: animate-background 5s infinite ease-in-out;
        }
        @keyframes animate-background{
            0% {
                background-position: 0 50%;
            }
            50%{
                background-position: 100% 50%;
            }
            100%{
                background-position: 0 50%;
            }
        }
        .container{
            /* background-color: red; */
            margin: 9% auto; 
          
        }
   
        </style>
</head>
<body>
    

<div class="container">
    <div class="row ">
        <div class="col-5 col-sm-4 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                       <img src="{{asset('icons8-google-contacts-96.png')}}">   
                            <div class="row-md-4">
                                <input id="email" type="email" class="form-control my-3 py-2     @error('email') is-invalid @enderror" placeholder="UserName" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row-md-6">
                                <input id="password" type="password" class="form-control my-3 py-2 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        {{-- <div class="row mb-3 text-center">
                            <div class="col md-3 ">
                                <div class="form-check md" >
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        OR
                        <div class="text-center">
                        <a href="{{url('/sign-in/google')}}">
                            <img src="image\google_signin.png" style="width: 2% height: 2%">
                        </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
