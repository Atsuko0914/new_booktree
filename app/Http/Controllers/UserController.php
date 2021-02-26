<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Intervention\Image\Facades\Image; // interventionimageを使う(画像のリサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う(ユーザー画像を保存,削除)

class UserController extends Controller
{
    public function index()
    {
        $authUser =  Auth::user();
        return view('user.index',['authUser' => $authUser]);
    }

    public function userEdit() 
    {   
        $authUser = Auth::user();
        return view('user.userEdit',['authUser' => $authUser]);
    }

    public function userUpdate(UserRequest $request, User $user) 
    {
        $posted_image = $request->file('user_image_path');
        
        // フォームに画像があれば画像を保存する
        if (empty($posted_image)) {
            $param = [
                'name'=>$request->name,
           ];
        } else {
 
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

         $param = [
            'name'=>$request->name,
            'user_image_path'=>$image_name,
        ];
        }

        User::where('id',$request->user_id)->update($param);
        return redirect()->route('user.index');
    }
}
