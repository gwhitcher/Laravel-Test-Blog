<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageController extends Controller
{

    public function showPage($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();

        return view('page.show')->withPage($page);
    }
}
