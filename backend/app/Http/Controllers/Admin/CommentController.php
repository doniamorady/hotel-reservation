<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->with('user', 'room')->get();
        return view('admin.comment.comments', compact('comments'));
    }


}
