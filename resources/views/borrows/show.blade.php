@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Borrow Details</h5>
                    <a href="{{ route('borrows.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-muted">Book Information</h6>
                        <p class="mb-1"><strong>Title:</strong> {{ $borrow->book_name }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Reader Information</h6>
                        <p class="mb-1"><strong>Name:</strong> {{ $borrow->reader_name }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Borrow History</h6>
                        <p class="mb-1"><strong>Borrow Date:</strong> {{ $borrow->borrow_date }}</p>
                        <p class="mb-1"><strong>Return Date:</strong> {{ $borrow->return_date }}</p>
                        <p class="mb-1">
                            <strong>Status:</strong> 
                            @if($borrow->status)
                                <span class="badge bg-success">Returned</span>
                            @else
                                <span class="badge bg-warning">Borrowed</span>
                            @endif
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Additional Information</h6>
                        <p class="mb-1"><strong>Created:</strong> {{ $borrow->created_at->format('d/m/Y H:i') }}</p>
                        <p class="mb-1"><strong>Last Updated:</strong> {{ $borrow->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection