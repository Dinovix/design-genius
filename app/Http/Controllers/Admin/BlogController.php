<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('blogposts');

        $blogposts = QueryBuilder::for(BlogPost::query())
            ->defaultSort('title')
            ->allowedSorts(['title', 'author', 'is_active', 'likes', 'created_at'])
            ->allowedFilters(['title', 'author', 'is_active', 'likes', 'created_at'])
            ->paginate(pageName: 'blogpostsPage')
            ->withQueryString();

        return Inertia::render('Admin/BlogPosts/Index', [
            'blogposts'     => $blogposts,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('blogposts')
                ->pageName('blogpostsPage')
                ->defaultSort('title')
                ->column(key: 'title', searchable: true, sortable: true)
                ->column(key: 'author', searchable: true, sortable: true)
                ->column(key: 'is_active', searchable: true, sortable: true)
                ->column(key: 'likes', searchable: true, sortable: true)
                ->column(key: 'created_at', searchable: true, sortable: true)
                ->column(label: 'Actions');
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/BlogPosts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request::validate([
            'title' => ['required', 'max:50'],
            'author' => ['nullable', 'max:100'],
            'description' => ['nullable', 'max:100'],
            'tags' => ['nullable', 'max:100'],
            'content' => ['required'],
            'is_active' => ['required', 'boolean'],
            'banner' => ['nullable', 'image'],
        ]);

        BlogPost::create([
            'user_id' => Auth::user()->id,
            'title' => Request::get('title'),
            'author' => Request::get('author'),
            'description' => Request::get('description'),
            'tags' => Request::get('tags'),
            'content' => Request::get('content'),
            'is_active' => Request::get('is_active'),
            'banner' => Request::file('banner') ? Request::file('banner')->store('blogposts') : null,
        ]);

        return Redirect::route('blogposts')->with('success', 'Blog Post created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogpost = $blogPost->toArray(); 
        $blogpost['banner'] = $blogpost['banner'] ? URL::route('image', ['path' => $blogpost['banner']]) : null;
        return Inertia::render('Admin/BlogPosts/Edit', [
            'blogpost' => $blogpost
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blogPost = BlogPost::findOrFail($id);
        Request::validate([
            'title' => ['required', 'max:50'],
            'author' => ['nullable', 'max:100'],
            'description' => ['nullable', 'max:100'],
            'tags' => ['nullable', 'max:100'],
            'content' => ['required'],
            'is_active' => ['required', 'boolean'],
            'banner' => ['nullable', 'image'],
        ]);

        $blogPost->update(Request::only('title', 'author', 'description', 'tags', 'content', 'is_active'));

        if (Request::file('banner')) {
            $old_image_path = $blogPost->banner; 
            try {
                $res = Storage::delete($old_image_path);
            } catch (\Throwable $th) {
                //throw $th;
                // TODO : Logs errors
            } 
            $blogPost->update(['banner' => Request::file('banner')->store('blogposts')]);
        }

        return Redirect::back()->with('success', 'Blog Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        if( $blogPost->banner ){
            try {
                $res = Storage::delete($blogPost->banner);
            } catch (\Throwable $th) {
                //throw $th;
                // TODO : Logs errors
            } 
        }
        $blogPost->delete();

        return Redirect::route('blogposts')->with('success', 'Blog Posts deleted.');
    }
}
