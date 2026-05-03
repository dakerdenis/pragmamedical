<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index($lang)
    {
        $blogPosts = BlogPost::latest('published_date')
            ->take(4)
            ->get();

        return view('pages.home', compact('lang', 'blogPosts'));
    }
}