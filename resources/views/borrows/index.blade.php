@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Borrow Management</h2>  
            </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p class="mb-0">{{ $message }}</p>
                </div>
                @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Book Title</th>
                                    <th>Reader Name</th>
                                    <th>Borrow Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th class="col-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrows as $borrow)
                                <tr class="{{ session('updated_id') == $borrow->id ? 'highlight-row' : '' }}">
                                    <tr>
                                        <td>{{ ++$i }}</td> 
                                        <td>{{ $borrow->book->name }}</td>
                                        <td>{{ $borrow->reader_name }}</td>
                                        <td>{{ $borrow->borrow_date }}</td>
                                        <td>{{ $borrow->return_date }}</td>
                                        <td>
                                            @if($borrow->status === 1)
                                                <span class="badge bg-success">Returned</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Borrowed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div action="{{ route('borrows.destroy',$borrow->id) }}" method="POST">
                                                <a class="btn btn-info btn-sm" href="{{ route('borrows.show',$borrow->id) }}">Show</a>
                                                <a class="btn btn-primary btn-sm" href="{{ route('borrows.edit',$borrow->id) }}">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $borrows->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection