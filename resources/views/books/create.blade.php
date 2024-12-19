@extends('layouts.app')

@section('content')

<h1>Create a New Book</h1>
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" id="author" name="author" required>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" class="form-control" id="category" name="category" required>
    </div>
    <div class="form-group">
        <label for="year">Year:</label>
        <select class="form-control" id="year" name="year" required>
            @for ($year = 1990; $year <= date("Y"); $year++)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
<a href="{{ route('books.index') }}" class="btn btn-primary mt-2">Return</a>

@endsection