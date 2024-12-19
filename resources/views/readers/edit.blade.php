@extends('layouts.app')
@section('content')
<div>
    <h1>Edit Reader</h1>
    <form action="{{ route('readers.update', $reader->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name }}">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $reader->birthday }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $reader->address }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $reader->phone }}">
        </div> <br>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
