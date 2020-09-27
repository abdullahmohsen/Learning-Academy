@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Categoties / Edit / {{ $cat->name }}</h5>
        <a href="{{ route('admin.cat.index') }}" class="btn btn-primary">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.cat.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $cat->id }}">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{ $cat->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>


@endsection
