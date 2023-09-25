<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

use Auth;
//use Illuminate\Support\Facades\Auth as FacadesAuth;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $user = auth()->user();


        $like = new Like();
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();

        return back();
    }

    public function destroy(Post $post, Like $like)
    {
        $user = auth()->user();

        $like = Like::find($like->id);
        $like->delete();


        return back();
    }
}
