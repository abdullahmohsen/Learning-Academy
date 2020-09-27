@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Students / Edit / {{ $student->name }}</h5>
        <a href="{{ route('admin.student.index') }}" class="btn btn-primary">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.student.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $student->id }}">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="{{ $student->email }}">
        </div>
        <div class="form-group">
            <label>Speciality</label>
            <input type="text" class="form-control" name="spec" value="{{ $student->spec }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>


@endsection
