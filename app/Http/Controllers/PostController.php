<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index() {
        $posts = Post::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        return view('posts.index', compact('posts'));
    }
}
