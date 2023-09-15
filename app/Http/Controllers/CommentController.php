<?php

namespace App\Http\Controllers;

use App\Models\ideas;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(ideas $ideas) {

        $comment = new Comment();
        $comment->idea_id = $ideas->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('ideas.show', $ideas->id)->with('success', "Comment Posted Successfully!");
    }
}
