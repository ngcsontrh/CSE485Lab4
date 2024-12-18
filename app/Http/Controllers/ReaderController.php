<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $page = Reader::orderBy('updated_at','desc')->paginate(10);
        $readers = Reader::orderBy('updated_at', 'desc')->paginate(10);
        return view('readers.index', compact('readers', 'i', 'page'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('readers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required',
                'birthday' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ]);
            $taskData = $request->all();
            Reader::create($taskData);
            return redirect()->route('readers.index')->with('success', 'Reader created successfully.');
    }  

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $reader = Reader::findorFail($id);
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $reader = Reader::findorFail($id);
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $taskData = $request->all();
        $reader = Reader::findorFail($id);
        $reader->update($taskData);
        return redirect()->route('readers.index')->with('success', 'Reader updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $reader = Reader::findOrFail($id);

    $reader->borrows()->delete();
    $reader->delete();
    return redirect()->route('readers.index')->with('success', 'Reader deleted successfully.');
    }
}
