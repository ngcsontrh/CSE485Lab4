@extends('layouts.app')

@section('content')
<div>
    <h1>Readers</h1>
    <a href="{{ route('readers.create') }}" class="btn btn-primary">Add Reader</a>
    <table class="table">
    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name </th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($readers as $reader)
                    <tr>
                        <td>{{ $reader->id }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <a href="{{ route('readers.show', $reader->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning">Edit</a>
                           
                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Delete Confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('readers.destroy', $reader->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                        </div>
                                                                                           
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{$readers->links('pagination::bootstrap-5')}}
</div>
@endsection