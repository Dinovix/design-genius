<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('categories');

        $categories = QueryBuilder::for(Category::query())
            ->defaultSort('name')
            ->allowedSorts(['name', 'description', 'created_at'])
            ->allowedFilters(['name', 'description', 'created_at'])
            ->paginate(pageName: 'categoriesPage')
            ->withQueryString();

        return Inertia::render('Admin/Categories/Index', [
            'categories'     => $categories,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('categories')
                ->pageName('categoriesPage')
                ->defaultSort('name')
                ->column(key: 'name', searchable: true, sortable: true)
                ->column(key: 'description', searchable: true, sortable: true)
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
        return Inertia::render('Admin/Categories/Create');
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
            'name' => ['required', 'max:50', Rule::unique('categories')],
            'description' => ['required'],
        ]);

        Category::create([
            'name' => Request::get('name'),
            'description' => Request::get('description'),
        ]);

        return Redirect::route('categories')->with('success', 'Product Category created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return Inertia::render('Admin/Categories/Edit', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'created_at' => $category->created_at,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Request::validate([
            'name' => ['required', 'max:50', Rule::unique('categories')],
            'description' => ['required'],
        ]);

        $category->update(Request::only('name', 'description'));

        return Redirect::back()->with('success', 'Product Category updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Auth::user()->is_admin) {
            return Redirect::back()->with('error', 'Deleting is not allowed.');
        }

        $category->delete();

        return Redirect::route('categories')->with('success', 'Category deleted.');
    }
}
