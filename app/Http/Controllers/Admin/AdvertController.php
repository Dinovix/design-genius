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

use App\Http\Controllers\Helpers\Helper;

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
                ->column(key: 'title', searchable: true, sortable: true)
                ->column(key: 'active', searchable: true, sortable: true)
                ->column(key: 'url', searchable: true, sortable: true)
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

        $advert = Advert::create([
            'title' => Request::get('title'),
            'description' => Request::get('description'),
            'url' => Request::get('url'),
            'active' => Request::get('active'),
            'image' => Request::file('image') ? Request::file('image')->store('adverts') : null,
        ]);
        
        if ($advert)
            Helper::log('ADVERT CREATED', "User added advert " . $advert->title);
        else 
            Helper::log('ADVERT CREATION ERROR', "Error while creating advert " . Request::get('title'));
       
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

        $result = $advert->update(Request::only('title', 'description', 'url', 'active'));

        if (Request::file('image')) {
            $old_image_path = $advert->image; 
            try {
                Storage::delete($old_image_path);
                $advert->update(['image' => Request::file('image')->store('adverts')]);
            } catch (\Exception $e) {
                Helper::log('ADVERT UPDATE ERROR', $e->getMessage(), false);
            } 
        }

        if ($result) 
            Helper::log('ADVERT UPDATED', "User updated advert " . $advert->title);
        
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
                Storage::delete($advert->image);
            } catch (\Exception $e) {
                Helper::log('ADVERT DELETE ERROR', $e->getMessage(), false);
            } 
        }
        $result = $advert->delete();

        if ($result)
            Helper::log('ADVERT DELETED', "User deleted advert " . $advert->title);

        return Redirect::route('adverts')->with('success', 'Advert deleted.');
    }
}
