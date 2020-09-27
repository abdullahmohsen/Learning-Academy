@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Courses / Add new</h5>
        <a href="{{ route('admin.course.index') }}" class="btn btn-primary">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.course.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <select class="custom-select" name="cat_id">
                <option selected disabled>Select category</option>
                @foreach($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="custom-select" name="trainer_id">
                <option selected disabled>Select trainer</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Small desc</label>
            <input type="text" class="form-control" name="small_desc">
        </div>
        <div class="form-group">
            <label>Desc</label>
            <textarea class="form-control" name="desc" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>


@endsection
