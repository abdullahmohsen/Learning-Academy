 @extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Trainers / Edit / {{ $trainer->name }}</h5>
        <a href="{{ route('admin.trainer.index') }}" class="btn btn-primary">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.trainer.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $trainer->id }}">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{ $trainer->name }}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $trainer->phone }}">
        </div>
        <div class="form-group">
            <label>Speciality</label>
            <input type="text" class="form-control" name="spec" value="{{ $trainer->spec }}">
        </div>
        <img src="{{ asset('uploads/trainers/'. $trainer->img) }}" height="100px" class="my-3">
        <div class="form-group">
            <input type="file" class="form-control-file" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>


@endsection
