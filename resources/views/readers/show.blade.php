@extends('layouts.app')
@section('content')
<div>
    <h1>Reader Detail</h1>
    <p><strong>Name:</strong> {{ $reader->name }}</p>
    <p><strong>Birthday:</strong> {{ $reader->birthday }}</p>
    <p><strong>Address:</strong> {{ $reader->address }}</p>
    <p><strong>Phone:</strong> {{ $reader->phone }}</p>
    <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection

