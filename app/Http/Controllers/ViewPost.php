<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Like;
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
        $likes = DB::table('likes')->max('userLike');
        $dislikes = DB::table('dislikes')->max('userDisLike');

        return view('affiche.index')->with([
            'posts' => $posts,
            'likes' => $likes,
            'dislikes' => $dislikes
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
