<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class Bookcontroller extends Controller
{
    public function index(){
        $book = Book::all();
        return $book;
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return $book;
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->user_id = $request->user_id;
        $book->save();
        return redirect('api/books');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('api/books');
    }
}
