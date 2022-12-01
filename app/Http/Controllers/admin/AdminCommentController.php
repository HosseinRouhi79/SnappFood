<?php

namespace App\Http\Controllers\admin;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('status',CommentStatus::TO_ADMIN)->get();
        return view('admin.comments',compact('comments'));
    }

    public function showComment($id)
    {
        $comment = Comment::where('id',$id)->first();
        return view('admin.showComments',compact('comment'));
    }
}
