<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all()->sortByDesc('created_at');
        return view('books.index', ['books' => $books]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(BookRequest $request, Book $book)
    {
        $book->fill($request->all());
        $book->user_id = $request->user()->id;
        $book->save();
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->fill($request->all())->save();
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }
}
