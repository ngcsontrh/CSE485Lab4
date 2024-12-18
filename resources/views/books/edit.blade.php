@extends('layouts.app')

@section('content')

<h1>Edit Book</h1>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}"  />
    </div>
    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required />
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" class="form-control" id="category" name="category" value="{{ $book->category }}" required />
    </div>
    <div class="form-group">
        <label for="year">Year:</label>
        <select class="form-control" id="year" name="year" required>
            @for ($year = 1990; $year <= date("Y"); $year++)
                <option value="{{ $year }}" @selected($book->year == $year)>{{ $year }}</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}" required />
    </div>
    <div class="mt-2">        
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Return</a>
    </div>
</form>

@endsection