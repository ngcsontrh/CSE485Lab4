@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 2500);
</script>
@endif
<h1>Books</h1>
<a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-2">Name</th>
            <th class="col-2">Author</th>
            <th class="col-2">Category</th>
            <th class="col-1">Year</th>
            <th class="col-1">Quantity</th>
            <th class="col-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->index }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->quantity }}</td>
            <td>
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info me-2">Show</a>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning me-2">Edit</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $book->id }}">
                    Delete
                </button>

                <div class="modal fade" id="delete{{ $book->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this book?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $books->links() }}
@endsection