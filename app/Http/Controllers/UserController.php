<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        return view('user/index',['authUser' => $authUser]);
    }

    public function userEdit() 
    {
        $authUser = Auth::user();
        return view('user/userEdit',['authUser' => $authUser]);
    }

    
}
