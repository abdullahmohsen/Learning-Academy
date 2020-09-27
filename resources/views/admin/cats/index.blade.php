@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Categoties</h5>
        <a href="{{ route('admin.cat.create') }}" class="btn btn-primary">Create new category</a>
    </div>

    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th class="text-center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cat->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.cat.edit', $cat->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('admin.cat.delete', $cat->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
