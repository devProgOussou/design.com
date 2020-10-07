<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RemoveLikeController extends Controller
{
    public function removeLike(Request $request)
    {
        $likes = DB::select("SELECT user_id FROM likes WHERE id = ".Auth::user()->id);
        if($likes)
        {
            DB::delete("DELETE FROM likes WHERE user_id = ".Auth::user()->id);
        }
        else
        {
            return back();
        }
    }
}
