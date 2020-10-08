<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemoveLikeController extends Controller
{
    public function removeLike(int $id, int $dislikes, Request $request)
    {
        $dislike = $dislikes + 1;
        DB::table('posts')->where('id', $id)->update(['dislikes' => $dislike]);
        return back();
    }
}
