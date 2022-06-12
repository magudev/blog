<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        $title = '';
        $posts = Post::where('status', 2)->latest('id')->paginate(8); 
        return view('posts.index', compact('posts', 'title'));
    }

    public function show(Post $post) 
    {
        $post = Post::find($post->id);
        $relateds = Post::where('category_id', $post->category_id)->where('status', 2)->where('id', '!=', $post->id)->latest('id')->take(4)->get();
        return view('posts.show', compact('post', 'relateds'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->where('status', 2)->latest('id')->paginate(8);
        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(8);
        return view('posts.tag', compact('posts', 'tag'));
    }

}
