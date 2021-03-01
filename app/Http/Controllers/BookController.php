<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; // interventionimageを使う(画像のリサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う(ユーザー画像を保存,削除)
use App\Library\BaseClass; //共通関数を呼び出す
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request, Book $book)
    {   

    // フォームに値があれば検索する
    $my_search = $request->my_search;
    $select_box = $request->select_box;

    if($my_search != '') {
        if($select_box === 'タイトル') {
            $books = Book::where('title', 'like', '%'.$my_search.'%')->get();
        } elseif($select_box === '著者') {
            $books = Book::where('author', 'like', '%'.$my_search.'%')->get();
        } elseif($select_box === 'キーワード') {
            $books = Book::where('keyword', 'like', '%'.$my_search.'%')->get();
        } 
        } else {
            $books = Book::orderBy('created_at', 'Desc')->paginate(5);
        }

        $my_book = Book::Where('user_id', Auth::id())->get();

    return view('books.index', ['books' => $books]);
 }
    
       


    public function create() {
        return view('books.create');
    }

    public function store(BookRequest $request, Book $book)
    {
        $form = $request->all();

        // フォームに画像があれば画像を保存する
        if(empty($form['book_image_path'])) 
        {
             $book->book_image_path = null;
         } else {
             
        $book->book_image_path = $this->getPicture($request);
        }

        // フォームから送信されてきたimageを削除
        unset($form['book_image_path']);

         // データベースに保存する
        $book->fill($form);
         // ログインユーザー情報を取得する
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
        $form = $request->all();

        if(empty($form['book_image_path']))
         {
            $book->book_image_path = null;
        } else {
            $book->book_image_path = $this->getPicture($request);
        }

        // フォームから送信されてきたimageを削除
        unset($form['book_image_path']);

        $book->fill($form);
        $book->save();
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

    // 画像アップロードの関数
    public function getPicture($request)
    {
        // ファイルを取得する
        $posted_image = $request->file('book_image_path');

        // 画像をリサイズしてjpgにencodeする
        // (InterventionImageのImageファサードを使用)
        $resized_image = Image::make($posted_image)->resize(300,300, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');

        // 自動回転を行う(ここでEXIFが削除される)
        $resized_image->orientate()->save();

        // 加工した画像からhashを生成し、ファイル名を設定する
        $image_hash = md5($resized_image->__toString());
        $image_name = "{$image_hash}.jpg";
        

        // 加工した画像を保存する
        Storage::put('public/image/' . $image_name, $resized_image);

        return $image_name;

    } 
        

}


