<?php

namespace App\Http\Controllers;

use App\post;
use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $posts = Post::paginate(5);
        $likes = DB::select("SELECT userLike FROM likes");
        return view('accueil')->with([
            'posts' => $posts,
            'likes' => $likes
        ]);
    }

    public function store(Request $request)
    {
        $comment = new Comments();
        $comment->comments = $request->input('comments');
        $comment->comments_id = $request->input('comments_id');
        $comment->save();
    }

    public function showPost()
    {
        $posts = Post::where('fname', Auth::user()->name)->get();
        return view('post.index', ['posts' => $posts]);
    }
}
