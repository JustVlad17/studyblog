<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function createPost(Request $request)
    {
        if ($request->isMethod('POST') && !empty($request->content) && !empty($request->title)) {
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category;
            $post->save();
            $post = Post::select('id')->max('id');
            header("Location: http://laravelblog.com/post/$post");
            exit();
        }
        return view('web.static.createPost');
    }

    public function showAllPosts()
    {
        $posts = Post::all();
        return view('adminPost/showAllPosts', ['posts' => $posts]);
    }

    public function deletePost($id)
    {
        Comment::where('post_id', $id)->delete();
        Post::destroy($id);
        return redirect()->route('posts');
    }

    public function editPost(Request $request)
    {
        $post = Post::find($request->id);
        if ($request->has('redact'))
        {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->updated_at = time();
            $post->save();
            header("Location: http://laravelblog.com/post/$request->id");
            exit();
        }
        return view('adminPost.editPost', ['post' => $post]);
    }
}
