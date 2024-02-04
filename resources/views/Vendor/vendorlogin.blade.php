<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vendor Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-block {
            margin-top: 50px;
        }

        .login-sec {
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background: #fff;
            border-radius: 5px;
        }

        h2 {
            color: #007bff;
            margin-bottom: 30px;
        }

        .alert-danger {
            margin-top: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 3px;
            padding: 15px;
            box-shadow: none;
            border: 1px solid #ced4da;
        }

        .form-check {
            margin-top: 20px;
        }

        .btn-login {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<section class="login-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-sec">
                <h2 class="text-center">Vendor Login</h2>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form class="login-form" action="{{ route('vendor.login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{old('email')}}">
                        @if($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @if($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                         @endif

                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">Remember Me</label>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-login btn-block">Submit</button>
                    </div>
                </form>
                <div class="text-center">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
