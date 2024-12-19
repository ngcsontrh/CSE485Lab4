<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
        ->join('readers', 'borrows.reader_id', '=', 'readers.id')
        ->select('borrows.*', 'books.name as book_name', 'readers.name as reader_name')
        ->orderBy('borrows.updated_at', 'desc')
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
            'return_date' => 'required|date|after:borrow_date',
            'status' => 'required|in:borrowed,returned'
        ]);

        $book = Book::findOrFail($request->book_id);
    
        Borrow::create([
            'book_id' => $request->book_id,
            'reader_name' => $book->reader_name,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => $request->status
        ]);
    
        return redirect()->route('borrows.index')->with('success', 'Borrow created successfully');
    }

    public function edit(Borrow $borrow)
    {
        $borrow = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
        ->join('readers', 'borrows.reader_id', '=', 'readers.id')
        ->select('borrows.*', 'books.name as book_name', 'readers.name as reader_name')
        ->where('borrows.id', $borrow->id)
        ->firstOrFail();

            return view('borrows.edit', compact('borrow'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean'
        ]);
    
        $borrow = Borrow::findOrFail($id);
    
        $borrow->update([
            'status' => $request->status
        ]);
        $borrow->save();
    
        return redirect()->route('borrows.index');
    
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Borrow deleted successfully');
    }

    public function show($id)
    {
        $borrow = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
        ->join('readers', 'borrows.reader_id', '=', 'readers.id')
        ->select('borrows.*', 'books.name as book_name', 'readers.name as reader_name')
        ->where('borrows.id', $id)
        ->firstOrFail();

    return view('borrows.show', compact('borrow'));
    }
}