<?php

namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
use App\Http\Requests;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use App\Services\RssFeed;
use App\Services\SiteMap;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    /* OLD
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.post')->withPost($post);
    }
    */

    public function index(Request $request)
    {
        $nav_tags = DB::table('tags')->orderBy('title', 'asc')->get();
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.index';

        return view($layout, $data, ['nav_tags' => $nav_tags]);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $nav_tags = DB::table('tags')->orderBy('title', 'asc')->get();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }
        $post->layout = $tag ? Tag::layout($tag) : 'blog.post';

        return view($post->layout, compact('post', 'tag'), ['nav_tags' => $nav_tags]);
    }

    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)
            ->header('Content-type', 'application/rss+xml');
    }

    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }
}
