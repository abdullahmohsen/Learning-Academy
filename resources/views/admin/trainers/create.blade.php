@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Trainers / Add new</h5>
        <a href="{{ route('admin.trainer.index') }}" class="btn btn-primary">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.trainer.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label>Speciality</label>
            <input type="text" class="form-control" name="spec">
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>


@endsection
