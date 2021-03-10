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
}
