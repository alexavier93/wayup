<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Solution;

class HomeController extends Controller
{

    public function index()
    {

        $solutions = Solution::all();

        $posts = Post::orderBy('id', 'desc')->limit(3)->get();

        return view('home.index', compact('solutions', 'posts'));

    }
}
