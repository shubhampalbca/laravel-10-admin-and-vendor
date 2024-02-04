<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .register-block {
            margin-top: 50px;
        }

        .register-sec {
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

        .btn-register {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-register:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<section class="register-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 register-sec">
                <h2 class="text-center">Vendor Registration</h2>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form class="register-form" action="{{ route('vendor.register')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="text-uppercase">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name')}}">
                        @if($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{old('email')}}">
                        @if($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="Mobile" class="text-uppercase">Mobile</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" value="{{old('mobile')}}">
                        @if($errors->has('mobile'))
                          <span class="text-danger">{{ $errors->first('mobile') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @if($errors->has('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                         @endif
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">I agree to the terms and conditions</label>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-register btn-block">Register</button>
                    </div>
                </form>
                <p>Don't have an account? <a href="{{ route('login')}}">Login here</a></p>

            </div>
        </div>
    </div>
</section>

</body>
</html>
