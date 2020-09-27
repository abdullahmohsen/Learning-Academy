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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('admin.home') }}">Learing Academy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.cat.index') }}">Categories</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.trainer.index') }}">Trainers</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.course.index') }}">Courses</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.student.index') }}">Students</a>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('admin.logout') }}">logout <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

