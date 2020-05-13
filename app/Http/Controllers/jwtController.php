<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Firebase\JWT\JWT;

class jwtController extends Controller
{
    public function index()
    {
        //把資訊封存成密碼
        $payload = array(
            "iat" => time(),
            "a" => 1,
            "b" => 2,
            "c" => 3
        );
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }

    public function auth()
    {
        //再將密碼解開取得資訊
        $token = request()->header('ApiToken');
        $arr = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        print_r($arr->iat);
    }
}
