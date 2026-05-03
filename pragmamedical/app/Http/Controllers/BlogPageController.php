<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogPageController extends Controller
{
    public function index($lang)
    {
        $posts = BlogPost::latest()->get();

        return view('pages.blog', compact('lang', 'posts'));
    }

    public function show($lang, $id)
    {
        $post = BlogPost::findOrFail($id);

        return view('pages.blog_item', compact('lang', 'post'));
    }
}