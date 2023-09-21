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
    
    if (!$user->hasLiked($post)) {
        $like = new Like();
        $like->user_id = $user->id;
        $post->likes()->save($like);
    }

    return back();
}

public function destroy(Post $post, Like $like)
{
    $user = auth()->user();

    if ($user->hasLiked($post) && $user->id === $like->user_id) {
        $like->delete();
    }

    return back();
}
}
