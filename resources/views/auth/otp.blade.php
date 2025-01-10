<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            backdrop-filter: blur(10px);
        }

        .card-header {
            background: linear-gradient(to right, #3490dc, #6574cd);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(52, 144, 220, 0.25);
            border-color: #3490dc;
        }

        .btn-primary {
            background: linear-gradient(to right, #3490dc, #6574cd);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 144, 220, 0.4);
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        OTP Verification
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success m-3">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session(key: 'error'))
                        <div class="alert alert-danger m-3">
                            {{session('error')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('otp.validate')}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="otp" class="form-label">Enter OTP Code</label>
                                <input type="text" class="form-control form-control-lg" id="otp" name="otp" placeholder="Enter your OTP">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Verify OTP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>