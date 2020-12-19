<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function deleteComment($post_id, $comment_id)
    {
        Comment::destroy($comment_id);
        header("Location: http://laravelblog.com/post/$post_id");
        exit();
    }
}
