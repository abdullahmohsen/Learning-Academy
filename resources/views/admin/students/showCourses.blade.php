@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h5>Students / Show Courses</h5>
        <div>
            <a href="{{ route('admin.student.addCourse', $student_id) }}" class="btn btn-info">Add to course</a>
            <a href="{{ route('admin.student.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <table class="table table-striped mt-5 w-100 text-center">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->pivot->status }}</td>
                    <td>
                        @if ($course->pivot->status !== 'approve')
                            <a href="{{ route('admin.student.approveCourse', [$student_id, $course->id]) }}" class="btn btn-sm btn-info mb-1">Approve</a>
                        @endif
                        @if ($course->pivot->status !== 'reject')
                            <a href="{{ route('admin.student.rejectCourse', [$student_id, $course->id]) }}" class="btn btn-sm btn-warning mb-1">Reject</a>
                        @endif
                        <a href="{{ route('admin.student.deleteCourse', [$student_id, $course->id]) }}" class="btn btn-sm btn-danger mb-1">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
