<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\PageFormFields;
use App\Http\Requests;
use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Http\Controllers\Controller;
use App\Page;
use Carbon\Carbon;

class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*
        $pages = Page::all();
        return view('admin.page.index', ['pages' => $pages]);
        */
        $pages = Page::where('created_at', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = $this->dispatch(new PageFormFields());

        return view('admin.page.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PageCreateRequest $request)
    {
        $page = Page::create($request->pageFillData());
        $page->syncTags($request->get('tags', []));

        return redirect()
            ->route('admin.page.index')
            ->withSuccess('New Page Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->dispatch(new PageFormFields($id));

        return view('admin.page.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->fill($request->pageFillData());
        $page->save();
        $page->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Post saved.');
        }

        return redirect()
            ->route('admin.page.index')
            ->withSuccess('Post saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->tags()->detach();
        $page->delete();

        return redirect()
            ->route('admin.page.index')
            ->withSuccess('Page deleted.');
    }
}
