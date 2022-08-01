<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;

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

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('discounts');

        $discounts = QueryBuilder::for(Discount::query())
            ->defaultSort('name')
            ->allowedSorts(['name', 'percentage', 'active', 'exp_date', 'created_at'])
            ->allowedFilters(['name', 'percentage', 'active', 'exp_date', 'created_at'])
            ->paginate(pageName: 'discountsPage')
            ->withQueryString();

        return Inertia::render('Admin/Discounts/Index', [
            'discounts'     => $discounts,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('discounts')
                ->pageName('discountsPage')
                ->defaultSort('name')
                ->column(key: 'name', searchable: true)
                ->column(key: 'percentage', searchable: true)
                ->column(key: 'active', searchable: true)
                ->column(key: 'exp_date', searchable: true)
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
        return Inertia::render('Admin/Discounts/Create');
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
            'name' => ['required', 'max:50', Rule::unique('discounts')],
            'description' => ['required'],
            'percentage' => ['required', 'numeric', 'gt:0', 'lte:100'],
            'is_for_rent' => ['required', 'boolean'],
            'active' => ['required', 'boolean'],
            'exp_date' => ['required', 'date', 'after:now'],
        ]);

        $discount = Discount::create([
            'name' => Request::get('name'),
            'description' => Request::get('description'),
            'percentage' => Request::get('percentage'),
            'is_for_rent' => Request::get('is_for_rent'),
            'active' => Request::get('active'),
            'exp_date' => Request::get('exp_date'),
        ]);

        if ($discount)
            Helper::log('DISCOUNT CREATED', "User added discount " . $discount->name);
        else 
            Helper::log('DISCOUNT CREATION ERROR', "Error while creating discount " . Request::get('name'));
       

        return Redirect::route('discounts')->with('success', 'Discount created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return Inertia::render('Admin/Discounts/Edit', [
            'discount' => [
                'id' => $discount->id,
                'name' => $discount->name,
                'description' => $discount->description,
                'percentage' => $discount->percentage,
                'is_for_rent' => $discount->is_for_rent,
                'active' => $discount->active,
                'exp_date' => $discount->exp_date,
                'created_at' => $discount->created_at,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        Request::validate([
            'name' => ['required', 'max:50', Rule::unique('discounts')],
            'description' => ['required'],
            'percentage' => ['required', 'numeric', 'gt:0', 'lte:100'],
            'is_for_rent' => ['required', 'boolean'],
            'active' => ['required', 'boolean'],
            'exp_date' => ['required', 'date', 'after:now'],
        ]);

        $result = $discount->update(Request::only('name', 'description', 'percentage', 'is_for_rent', 'active', 'exp_date'));

        if ($result) 
            Helper::log('DISCOUNT UPDATED', "User updated discount " . $discount->name);

        return Redirect::back()->with('success', 'Discount updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $result = $discount->delete();

        if ($result) 
            Helper::log('DISCOUNT DELETED', "User deleted discount " . $discount->name);

        return Redirect::route('discounts')->with('success', 'Discount deleted.');
    }
}
