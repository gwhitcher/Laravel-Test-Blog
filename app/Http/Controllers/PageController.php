<?php

namespace App\Http\Controllers;

use DB;
use App\Page;

class PageController extends Controller
{
    public function index() {
        $posts = DB::table('posts')->where('page_image', '!=', '')->orderBy('published_at', 'desc')->take(config('blog.featured_images'))->get();
        $nav_tags = DB::table('tags')->orderBy('title', 'asc')->get();

        return view('page.index', ['posts' => $posts], ['nav_tags' => $nav_tags]);
    }

    public function showPage($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        $nav_tags = DB::table('tags')->orderBy('title', 'asc')->get();

        return view('page.show', ['nav_tags' => $nav_tags])->withPage($page);
    }
}
