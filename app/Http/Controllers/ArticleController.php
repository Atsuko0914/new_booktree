<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; // interventionimageを使う(画像のリサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う(ユーザー画像を保存,削除)



class ArticleController extends Controller
{   
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    
    public function index(Request $request)
    {   
        // フォームに値があれば検索する
        $search = $request->search;
       if ($search != '') {
         $articles = Article::where('article_body', 'like', '%'.$search.'%')->get();
       } else {
        $articles = Article::all()->sortByDesc('created_at');
       }
       
        return view('articles.index', ['articles' => $articles]);
   
    }

    public function create()
    {
        return view('articles.create');    
    }

    public function store(ArticleRequest $request, Article $article)
    {   
        $form = $request->all();
        

        // フォームに画像があれば画像を保存する
        if (empty($form['article_image_path'])) {
            $article->article_image_path = null;
        } else {
            // ファイルを取得する
            $posted_image = $request->file('article_image_path');
    
            // 画像をリサイズしてjpgにencodeする(InterventionImageのImageファサードを使用)
            $resized_image = Image::make($posted_image)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            
            // 自動回転を行う(ここでEXIFが削除される)
            $resized_image->orientate()->save();
            
            // 加工した画像からhashを生成し、ファイル名を設定する
            $image_hash = md5($resized_image->__toString());
            $image_name = "{$image_hash}.jpg";

            // 加工した画像を保存する
            Storage::put('public/image/' . $image_name, $resized_image); 
            
            $article->article_image_path = $image_name;
        }

        // ログインユーザー情報を取得する
        $article->user_id = $request->user()->id;

        // フォームから送信されてきたimageを削除
        unset($form['article_image_path']);

        // データベースに保存する
        $article->fill($form);
        $article->save();

        return redirect()->route('articles.index');

        
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);    
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
    
    

}
