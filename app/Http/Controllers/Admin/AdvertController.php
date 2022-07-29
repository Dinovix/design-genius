<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;

use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('adverts');

        $adverts = QueryBuilder::for(Advert::query())
            ->defaultSort('title')
            ->allowedSorts(['title', 'active', 'url', 'created_at'])
            ->allowedFilters(['title', 'active', 'url', 'created_at'])
            ->paginate(pageName: 'advertsPage')
            ->withQueryString();

        return Inertia::render('Admin/Adverts/Index', [
            'adverts'     => $adverts,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('adverts')
                ->pageName('advertsPage')
                ->defaultSort('title')
                ->column(key: 'title', searchable: true)
                ->column(key: 'active', searchable: true)
                ->column(key: 'url', searchable: true)
                ->column(key: 'created_at', searchable: true)
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
        return Inertia::render('Admin/Adverts/Create', []);
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
            'description' => ['nullable', 'max:100'],
            'url' => ['nullable', 'url'],
            'active' => ['required', 'boolean'],
            'image' => ['nullable', 'image'],
        ]);

        Advert::create([
            'title' => Request::get('title'),
            'description' => Request::get('description'),
            'url' => Request::get('url'),
            'active' => Request::get('active'),
            'image' => Request::file('image') ? Request::file('image')->store('adverts') : null,
        ]);

        return Redirect::route('adverts')->with('success', 'Advert created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        $advert = $advert->toArray(); 
        $advert['image'] = $advert['image'] ? URL::route('image', ['path' => $advert['image']]) : null;
        return Inertia::render('Admin/Adverts/Edit', [
            'advert' => $advert
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        Request::validate([
            'title' => ['required', 'max:50'],
            'description' => ['nullable', 'max:100'],
            'url' => ['nullable', 'url'],
            'active' => ['required', 'boolean'],
            'image' => ['nullable', 'image'],
        ]);

        Advert::create([
            'title' => Request::get('title'),
            'description' => Request::get('description'),
            'url' => Request::get('url'),
            'active' => Request::get('active'),
            'image' => Request::file('image') ? Request::file('image')->store('adverts') : null,
        ]);

        $advert->update(Request::only('title', 'description', 'url', 'active'));

        if (Request::file('image')) {
            $old_image_path = $advert->image; 
            try {
                $res = Storage::delete($old_image_path);
            } catch (\Throwable $th) {
                //throw $th;
                // TODO : Logs errors
            } 
            $advert->update(['image' => Request::file('image')->store('adverts')]);
        }

        return Redirect::back()->with('success', 'Advert updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        if( $advert->image ){
            try {
                $res = Storage::delete($advert->image);
            } catch (\Throwable $th) {
                //throw $th;
                // TODO : Logs errors
            } 
        }
        $advert->delete();

        return Redirect::route('advert')->with('success', 'Advert deleted.');
    }
}