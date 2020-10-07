<?php

namespace App\Http\Controllers;

//use App\Comments;
use App\Http\Requests\PostsRequest;
use App\post;

class PostController extends Controller
{
    public function index()
    {
//        return view('home');
        $posts = post::orderBy('created_at', 'desc')->get();
        return view('post.index', ['posts' => $posts]);
    }

    public function store(PostsRequest $request)
    {
        $post = new post();
        $post->name = $request->input('name');
        $post->fname = $request->input('fname');
        $post->description = $request->input('description');
        $post->user_id = $request->input('user_id');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        } else {
            return view('home');
        }
        $post->save();
        return back();
    }
}
