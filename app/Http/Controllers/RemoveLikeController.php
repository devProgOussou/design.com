<?php

namespace App\Http\Controllers;

use App\Dislike;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RemoveLikeController extends Controller
{
    public function removeLike(Request $request)
    {
        $likes = DB::select("SELECT user_id FROM likes WHERE user_id = ".Auth::user()->id);

        if($likes)
        {
            DB::delete("DELETE FROM dislikes WHERE user_id = ".Auth::user()->id);
            return back();
        }
        else
        {
            $dislike = new Dislike();
            $dislike->user_id = $request->input('user_id');
            $dislike->post_id = $request->input('post_id');
            $dislike->userDisLike = 1;
            $dislike->save();
            return back();
        }
    }
}
