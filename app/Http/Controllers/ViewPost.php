<?php

namespace App\Http\Controllers;

use App\post;
use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewPost extends Controller
{
    public function showPost()
    {
        return view('home');
    }
    public function showList()
    {
        if (Auth::check()) {
            $posts = DB::select("SELECT * FROM posts ORDER BY created_at DESC");
            // dd($posts);
            return view('affiche.index')->with([
                'posts' => $posts,
            ]);
        }
        else
            return view('auth.login');
    }
    public function store(Request $request)
    {
        $comment = new Comments();
        $comment->comments = $request->input('comments');
        $comment->comments_id = $request->input('comments_id');
        $comment->save();
        return back();
    }
    public function showLike()
    {
        $counts = DB::table('likes')
            ->where('like', '=', 1);

        return view('affiche.index', ['like' => $counts]);
    }

}
