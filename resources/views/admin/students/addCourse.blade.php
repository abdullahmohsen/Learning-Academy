@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h5>Students / Edit / Add Course</h5>
        <a href="{{ route('admin.student.showCourses', $student_id) }}" class="btn btn-primary">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.student.storeCourse', $student_id) }}">
        @csrf
        <input type="hidden" name="id" value="{{ $student_id }}">
        <div class="form-group">
            <select class="custom-select" name="course_id">
                <option selected disabled>Select course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>


@endsection
