<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="cotainer">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form action="{{route("admin.reset.password.post")}}" method="post">
                            @csrf
                            @error("email")
                                <span class="text text-danger">* {{$message}}</span>
                            @enderror
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                    Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email">
                                </div>
                            </div>
                            @error("password")
                            <span class="text text-danger">* {{$message}}</span> @enderror
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Type New
                                    Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password">
                                </div>
                            </div>
                            @error("retypepassword")
                                <span class="text text-danger">* {{$message}}</span>
                            @enderror
                            <div class="form-group row">
                                <label for="retypepassword" class="col-md-4 col-form-label text-md-right">Retype New
                                    Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="retypepassword" class="form-control"
                                        name="retypepassword">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route("admin.reset.password.post")}}"><button type="submit"
                                        class="btn btn-primary">
                                        Reset Password
                                    </button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>