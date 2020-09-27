@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Courses</h5>
        <a href="{{ route('admin.course.create') }}" class="btn btn-primary">Create new course</a>
    </div>

    <table class="table table-striped mt-5 text-center">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset('uploads/courses/'.$course->img) }}" class="h-50">
                    </td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->price }}</td>
                    <td>
                        <a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-sm btn-info  mb-1">Edit</a>
                        <a href="{{ route('admin.course.delete', $course->id) }}" class="btn btn-sm btn-danger  mb-1">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{--  <div class="d-flex justify-content-center w-100 mb-5">
        {!! $courses->render() !!}
    </div>  --}}
@endsection
