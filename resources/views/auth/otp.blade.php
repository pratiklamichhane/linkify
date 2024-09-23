<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        /* modify login page */
        .card {
            margin-top: 50px;
        }

        .card-header {
            background-color: #3490dc;
            color: white;
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #3490dc;
            border-color: #3490dc;
        }

        .btn-primary:hover {
            background-color: #2779bd;
            border-color: #2779bd;
        }

        .btn-primary:focus {
            box-shadow: none;
        }

        .btn-primary:active {
            background-color: #2368a0;
            border-color: #2368a0;
        }


    </style>
</head>
<body>
    <!-- make a register page using bootstrap 5 name , user ,  email , phone , password -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session(key: 'error'))
                        <div class="alert alert-danger mt-3">
                            {{session('error')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('otp.validate')}}" method="post">
                            @csrf
                
                            <div class="mb-3">
                                <label for="otp" class="form-label">OTP</label>
                                <input type="text" class="form-control" id="otp" name="otp">
                            </div>
                

                            <button type="submit" class="btn btn-primary">Validate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>