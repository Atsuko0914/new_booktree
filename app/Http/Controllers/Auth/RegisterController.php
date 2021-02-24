<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; // interventionimageを使う(画像のリサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う(ユーザー画像を保存,削除)

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        if(empty($data['book_image_path']))
        {
            $data['user_image_path'] = null;
        } else {
        
            // ファイルを取得する
        $posted_image = $data['user_image_path'];

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

        $data['user_image_path'] = $image_name;
    }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_image_path'=> $data['user_image_path'],
            'password' => Hash::make($data['password']
        ),
        ]);

    }
}
