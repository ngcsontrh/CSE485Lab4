
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Borrow Status</h5>
                    <a href="{{ route('borrows.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Book Title</label>
                            <input type="text" class="form-control" value="{{ $borrow->book_name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Reader Name</label>
                            <input type="text" class="form-control" value="{{ $borrow->reader_name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>
                                    Borrowed
                                </option>
                                <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>
                                    Returned
                                </option>
                            </select>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection