@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Students</h5>
        <a href="{{ route('admin.student.create') }}" class="btn btn-primary">Create new student</a>
    </div>

    <table class="table table-striped mt-5 w-100 text-center">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">speciality</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @if($student->spec !== null)
                            {{ $student->spec }}
                        @else
                            Not exist
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-sm btn-info mb-1">Edit</a>
                        <a href="{{ route('admin.student.delete', $student->id) }}" class="btn btn-sm btn-danger mb-1">Delete</a>
                        <a href="{{ route('admin.student.showCourses', $student->id) }}" class="btn btn-sm btn-primary mb-1">Show Courses</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
