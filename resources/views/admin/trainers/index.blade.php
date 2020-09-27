@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Trainers</h5>
        <a href="{{ route('admin.trainer.create') }}" class="btn btn-primary">Create new trainer</a>
    </div>

    <table class="table table-striped mt-5 text-center">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">speciality</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset('uploads/trainers/'.$trainer->img) }}" class="h-100">
                    </td>
                    <td>{{ $trainer->name }}</td>
                    <td>
                        @if($trainer->phone !== null)
                            {{ $trainer->phone }}
                        @else
                            Not exist
                        @endif
                    </td>
                    <td>{{ $trainer->spec }}</td>
                    <td>
                        <a href="{{ route('admin.trainer.edit', $trainer->id) }}" class="btn btn-sm btn-info mb-1">Edit</a>
                        <a href="{{ route('admin.trainer.delete', $trainer->id) }}" class="btn btn-sm btn-danger mb-1">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
