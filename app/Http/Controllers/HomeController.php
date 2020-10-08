<?php

namespace App\Http\Controllers;

use App\Like;
use App\post;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function likePost(Request $request)
    {
        $userLike = DB::select("SELECT * FROM likes WHERE user_id = ".Auth::user()->id);

        if($userLike)
        {
            DB::delete("DELETE FROM likes WHERE user_id = ".Auth::user()->id);
            return back();
        }
        else
        {
            $userLikes = new Like();
            $userLikes->user_id = $request->input('user_id');
            $userLikes->post_id = $request->input('post_id');
            $userLikes->userLike = 1;
            $userLikes->save();
            return back();
        }
    }
}
