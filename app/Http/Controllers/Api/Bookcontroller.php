<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class Bookcontroller extends Controller
{
    public function index(){
        $book = Book::get(['id', 'title', 'author', 'purchase_date', 'price', 'publication', 'issue_date', 'keyword', 'summary', 'user_id']);
        
        $project =[
            'status'=>200,
            'body'=>$book,
        ];
        
        return $project;
    }

    public function edit($id)
    {
        $book = Book::find($id, ['title', 'author', 'purchase_date', 'price', 'publication', 'issue_date', 'keyword', 'summary', 'user_id']);

        $project =[
            'status'=>200,
            'body'=>$book,
        ];
        
        return $project;
    }

    public function store(Request $request)
    {   
        $book = new Book;
        
         if(empty($book->title = $request->title)) {

                return $project =[
                'status' => 300,
                ];
        } elseif (empty($book->user_id = $request->user_id)) {

                return $project =[
                'status' => 300,
                ];

        } elseif (empty($book->author = $request->author)) {

                return $project =[
                'status' => 300,
                ];
        } else {
            
        $book->title = $request->title;
        $book->author = $request->author;
        $book->user_id = $request->user_id;
        $book->purchase_date = $request->purchase_date;
        $book->price = $request->price;
        $book->publication = $request->publication;
        $book->issue_date = $request->issue_date;
        $book->keyword = $request->keyword;
        $book->summary = $request->summary;
        $book->user_id = $request->user_id;
        $book->save();
        
            return $project =[
                'status'=>200,
            ];
        }

        

    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return $project =[
            'status'=>200,
        ];
    }
}
