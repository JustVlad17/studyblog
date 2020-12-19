<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class PostController extends Controller
{

    public function showAllPosts()
    {
        $posts = Post::all()->sortByDesc('id');
        return view('post.showAllPosts', ['posts' => $posts]);
    }

    public function showOnePost(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (!empty($request->comment)) {
                $this->saveComment(
                    $request->comment,
                    $request->session()->get('id'),
                    (int)$request->id
                );
            }
            header("Location: http://laravelblog.com/post/$request->id");
            exit();
        }
        $post = Post::find($request->id);
        $comments = $post->comments->sortByDesc('id');
        $logins = $post->logins;
        return view('post.showOnePost', [
                'post' => $post,
                'comments' => $comments,
                'logins' => $logins
            ]);
    }

    private function saveComment($text, $user_id, $post_id)
    {
        $comment = new Comment();
        $comment->comment = $text;
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;
        $comment->save();
    }

    public function showCategoryPosts($id)
    {
        $category = Category::where('id', $id)->first();
        $posts = Post::where('category_id', $id)->get();
        return view('post.showCategoryPosts', ['posts' => $posts, 'category' => $category]);
    }

}

