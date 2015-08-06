<?php

namespace App\Http\Controllers;

use DB;
use App\Page;

class PageController extends Controller
{
    public function index() {
        $posts = DB::table('posts')->orderBy('id', 'desc')->take(config('blog.featured_images'))->get();

        return view('page.index', ['posts' => $posts]);
    }

    public function showPage($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();

        return view('page.show')->withPage($page);
    }
}
