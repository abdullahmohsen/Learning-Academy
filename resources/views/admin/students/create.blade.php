@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Student / Add new</h5>
        <a href="{{ route('admin.student.index') }}" class="btn btn-primary">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.student.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Speciality</label>
            <input type="text" class="form-control" name="spec">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>


@endsection
