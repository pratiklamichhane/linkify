<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }

        .card-header {
            background: transparent;
            border-bottom: none;
            padding: 25px 25px 5px;
            font-size: 24px;
            font-weight: 600;
            color: #444;
        }

        .card-body {
            padding: 25px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.25);
            border-color: #667eea;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
        }

        .alert {
            border-radius: 10px;
        }

        .mb-3 label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #444;
        }

        .input-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            cursor: pointer;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">
                        Welcome Back
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger mx-4 mt-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success mx-4 mt-3">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mx-4 mt-3">
                            {{session('error')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('login.validate')}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter your email">
                            </div>
                            
                            <div class="mb-4">
                                <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                                    <span class="password-toggle" onclick="togglePassword()">
                                        <i class="far fa-eye" id="toggleIcon"></i>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Login <i class="fas fa-arrow-right ms-2"></i>
                            </button>

                            <!-- Added Register Link Below Login Button -->
                            <div class="text-center mt-3">
                                Already have an account? <a href="{{ route('register') }}">Click here to register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.className = 'far fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                toggleIcon.className = 'far fa-eye';
            }
        }
    </script>
</body>
</html>
