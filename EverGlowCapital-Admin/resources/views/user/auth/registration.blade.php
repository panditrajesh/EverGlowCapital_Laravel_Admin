<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        @if (session()->has('message'))
                            <span class="alert alert-success">
                                {{session()->get('message')}}
                            </span>
                        @endif
                        <br>
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                <form method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            @error('firstname')
                                                <span class="text text-danger">* {{$message}}</span>
                                            @enderror
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="firstname">First Name</label>
                                                <input type="text" id="firstname" name="firstname"
                                                    class="form-control form-control-lg" value="{{old('firstname')}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            @error('lastname')
                                                <span class="text text-danger">* {{$message}}</span>
                                            @enderror
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="lastname">Last Name</label>
                                                <input type="text" id="lastname" name="lastname"
                                                    class="form-control form-control-lg" value="{{old('lastname')}}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 ">
                                            @error('email')
                                                <span class="text text-danger">* {{$message}}</span>
                                            @enderror
                                            <div data-mdb-input-init class="form-outline datepicker w-100">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control form-control-lg" id="email"
                                                    name="email" value="{{old('email')}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            @error('phone')
                                                <span class="text text-danger">* {{$message}}</span>
                                            @enderror
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="phone">Phone Number</label>
                                                <input type="text" id="phone" name="phone"
                                                    class="form-control form-control-lg" value="{{old('phone')}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 ">
                                            @error('username')
                                                <span class="text text-danger">* {{$message}}</span>
                                            @enderror
                                            <div data-mdb-input-init class="form-outline datepicker w-100">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control form-control-lg" id="username"
                                                    name="username" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 ">
                                            @error('password')
                                                <span class="text text-danger">* {{$message}}</span>
                                            @enderror
                                            <div data-mdb-input-init class="form-outline datepicker w-100">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control form-control-lg"
                                                    id="password" name="password" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            @error('confirmpassword')
                                                <span class="text text-danger">* {{$message}}</span>
                                            @enderror

                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="confirmpassword">Retype Password</label>
                                                <input type="password" id="confirmpassword" name="confirmpassword"
                                                    class="form-control form-control-lg" value="" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <a href="{{route('user.form.register')}}"><button class="btn btn-primary"
                                                type="submit">Register</button></a>
                                    </div>

                                </form>
                                <br>
                                <a href="{{route('user.form.login')}}"
                                    style="text-decoration:none; color:black"><b>Already
                                        have an account?</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>