<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container my-5 py-5">

        @include('admin.inc.errors')

        <form method="POST" action="{{ route('admin.handleLogin') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>

    </div>



    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ asset('front/js') }}/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="{{ asset('front/js') }}/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('front/js') }}/bootstrap.min.js"></script>
</body>
</html>


