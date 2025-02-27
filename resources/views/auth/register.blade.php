<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .card-header {
            background: transparent;
            color: #333;
            padding: 25px;
            font-size: 28px;
            font-weight: 600;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .card-content {
            padding: 30px;
        }

        .input-field input {
            border-radius: 5px;
            padding-left: 10px !important;
            box-sizing: border-box;
        }

        .input-field input:focus {
            border-bottom: 2px solid #667eea !important;
            box-shadow: none !important;
        }

        .input-field input:focus + label {
            color: #667eea !important;
        }

        .btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            width: 100%;
            padding: 12px;
            height: auto;
            font-size: 16px;
            border-radius: 8px;
            text-transform: none;
            font-weight: 500;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.35);
        }

        .btn:hover {
            background: linear-gradient(45deg, #764ba2, #667eea);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.45);
        }

        .error-panel {
            border-radius: 8px;
            margin: 15px;
        }

        .error-panel ul {
            margin: 0;
            padding: 10px 25px;
        }

        .error-panel li {
            color: white;
        }

        .input-field {
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card">
                    <div class="card-header center-align">
                        Create Account
                    </div>
                    @if($errors->any())
                        <div class="error-panel red lighten-2">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-content">
                        <form action="{{route('register.store')}}" method="post">
                            @csrf
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="name" id="name" value="{{old('name')}}">
                                <label for="name">Full Name</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">alternate_email</i>
                                <input type="text" name="username" id="username" value="{{old('username')}}">
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" id="email" value="{{old('email')}}">
                                <label for="email">Email Address</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">phone</i>
                                <input type="text" name="phone" id="phone" value="{{old('phone')}}">
                                <label for="phone">Phone Number</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name="password" id="password">
                                <label for="password">Password</label>
                            </div>
                            <button type="submit" class="btn waves-effect waves-light">
                                Create Account <i class="material-icons right">send</i>
                            </button>

                            <!-- Added Login Link Below Register Button -->
                            <div class="center-align" style="margin-top: 15px;">
                                Already have an account? <a href="{{ route('login') }}">Click here to login</a>
                            </div>
                                                      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
