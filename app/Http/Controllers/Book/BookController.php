<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate(
            [
                'title' => 'required',
                'year' => 'required',
                'isbn' => ['required', Rule::unique('books', 'isbn')],
                'price' => 'required',
                'page_number' => ['required'],
                'description' => 'required',

            ]
        );

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Book::create($formFields);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //Make sure the logged in user is owner
        if ($book->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate(
            [
                'title' => 'required',
                'year' => 'required',
                'isbn' => ['required'],
                'price' => 'required',
                'page_number' => ['required'],
                'description' => 'required',

            ]
        );

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $book->update($formFields);



        return redirect()->route('books.index')->with('success', 'Book Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //Make sure the logged in user is owner
        if($book->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        } 

        $book->delete();

        return redirect()->route('books.index')->with('danger', 'Book deleted successfully.');
    }
}
