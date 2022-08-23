<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
      <link rel="icon" type="image/x-icon" href="">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>
<form action="{{ route('check') }}" method="POST">
    {{ csrf_field() }}
    <div class="results">
        <!-- alert message -->
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ session::get('fail') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">

                <div class="img" style="background-image: url(/image/bg-1.jpg);">
                </div>
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Admin Login</h3>
                        </div>

                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Password</label>
                        <input type="password"name="password" class="form-control" placeholder="password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login </button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50 text-left">

                        </div>

                    </div>
</form>


</div>
</div>
</div>
</div>
</div>
</section>
</body>

</html>
