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
                        Register
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
                    <div class="card-body">
                        <form action="{{route('register.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                value="{{old('phone')}}">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>