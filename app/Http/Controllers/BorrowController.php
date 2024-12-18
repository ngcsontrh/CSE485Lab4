<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
        return view('borrows.index', compact('borrows'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $books = Book::all();
        return view('borrows.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date'
        ]);

        Borrow::create($request->all());
        return redirect()->route('borrows.index')->with('success', 'Borrow created successfully');
    }

    public function edit(Borrow $borrow)
    {
        $books = Book::all();
        return view('borrows.edit', compact('borrow', 'books'));
    }

    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'return_date' => 'required|date',
            'status' => 'required|in:borrowed,returned'
        ]);

        $borrow->update([
            'return_date' => $request->return_date,
            'status' => $request->status
        ]);

        return redirect()->route('borrows.index')->with('success', 'Borrow updated successfully');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Borrow deleted successfully');
    }

    public function show(Borrow $borrow)
    {
        return view('borrows.show', compact('borrow'));
    }
}