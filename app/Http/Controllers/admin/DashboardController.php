<?php

namespace App\Http\Controllers\admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $posts = Post::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        return view('admin.pages.dashboard', compact('posts'));
    }
}
