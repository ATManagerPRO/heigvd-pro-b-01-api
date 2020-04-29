<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    public function login(){
        return view('googleAuth/login', [
            'test' => "test"
        ]);
    }
}
