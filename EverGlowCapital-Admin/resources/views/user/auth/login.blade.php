<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <br>
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            @if (session()->has('message'))
                                <span class="alert alert-success">
                                    {{session()->get('message')}}
                                </span>
                            @endif
                            @if (session()->has('error'))
                                <span class="alert alert-danger">
                                    {{session()->get('error')}}
                                </span>
                            @endif
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>
                                <form method="post">
                                    @csrf
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

                                    <div class="col-md-6 mb-4 ">
                                        @error('password')
                                            <span class="text text-danger">* {{$message}}</span>
                                        @enderror
                                        <div data-mdb-input-init class="form-outline datepicker w-100">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                name="password" value="" />
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <a href=""><button class="btn btn-primary" type="submit">Login</button></a>
                                    </div>
                                    <br>
                                    <a href="{{route('user.form.register')}}"
                                        style="text-decoration:none; color: black"><b>Don't have an
                                            account?</b></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>