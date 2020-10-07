<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Facades\DB;

class ViewPost extends Controller
{
    public function showPost()
    {
//        $comments = Comments::orderBy('created_at', 'desc')->get();
//        return view('home', ['comments' => $comments]);
        return view('home');
    }
    public function showList()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $counts = DB::select("SELECT COUNT(*) FROM likes");
        return view('affiche.index')->with([
            'posts' => $posts,
            'counts' => $counts,
        ]);
    }
    public function store (Request $request)
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
