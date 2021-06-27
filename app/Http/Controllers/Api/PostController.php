<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        $res = [
            'response' => true,
            'posts'=> $posts
        ];

        return response()->json($res);
    }
}