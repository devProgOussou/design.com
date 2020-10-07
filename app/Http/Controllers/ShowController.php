<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function showPost()
    {
        $counts = DB::table('likes')
            ->where('like', '=', 1);
        return view('affiche.index', ['like' => $counts]);
    }
}
