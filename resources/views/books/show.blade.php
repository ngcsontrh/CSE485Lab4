<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
@extends('layouts.app')

@section('content')

<h1>Book detail</h1>
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}" disabled />
</div>
<div class="form-group">
    <label for="author">Author:</label>
    <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" disabled />
</div>
<div class="form-group">
    <label for="category">Category:</label>
    <input type="text" class="form-control" id="category" name="category" value="{{ $book->category }}" disabled />
</div>
<div class="form-group">
    <label for="year">Year:</label>
    <select class="form-control" id="year" name="year" disabled>
        <option value="{{ $book->year }}" selected>{{ $book->year }}</option>
    </select>
</div>
<div class="form-group">
    <label for="quantity">Quantity:</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}" disabled />
</div>
<a href="{{ route('books.index') }}" class="btn btn-secondary mt-2">Return</a>

@endsection