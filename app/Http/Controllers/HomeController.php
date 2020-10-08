<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        // return view('home');
        $posts = Post::OrderBy('created_at', 'desc')->take(5)->get();
        return view('post.index', ['posts' => $posts]);
    }

    public function likePost(int $id, int $likes)
    {
        $like = DB::select("SELECT likes FROM posts WHERE id =" . $id);
        $like = $likes + 1;
        DB::table('posts')->where('id', $id)->update(['likes' => $like]);
        return back();
    }
}
