<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;

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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('products');
        $products = QueryBuilder::for(Product::class)
            ->allowedFields(['category.name'])
            ->with(['category','discount'])
            ->defaultSort('name')
            ->allowedSorts(['category.name', 'name', 'sale_price', 'short_description', 'quantity', 'active', 'created_at'])
            ->allowedFilters(['category.name', 'name', 'sale_price', 'short_description', 'quantity', 'active', 'created_at'])
            ->paginate(pageName: 'productsPage')
            ->withQueryString();

        return Inertia::render('Admin/Products/Index', [
            'products'     => $products,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('products')
                ->pageName('productsPage')
                ->defaultSort('name')
                ->column(key: 'name', searchable: true, sortable: true)
                // TODO : add category name column 
                // ->column(key: 'category.name', searchable: true, sortable: true)
                ->column(key: 'sale_price', searchable: true, sortable: true)
                ->column(key: 'short_description', searchable: true)
                ->column(key: 'quantity', searchable: true, sortable: true)
                ->column(key: 'active', searchable: true, sortable: true)
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
        $categories = Category::all(); 
        $discounts = Discount::all(); 
        return Inertia::render('Admin/Products/Create', [
            'categories' => $categories, 
            'discounts' => $discounts 
        ]);
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
            "name" => ['required', 'max:50', Rule::unique('products')],
            "category_id" => ['required'],
            "discount_id" => ['nullable'],
            "sale_price" => ['required', 'numeric', 'between:1,999999999999999.99'],
            "is_rentable" => ['required'],
            "rent_price" => [ Request::get('is_rentable') ? 'required' : 'nullable', 'numeric' ],
            "weight" => ['nullable', 'numeric'],
            "available_colors" => ['nullable'],
            "cart_description" => ['nullable'],
            "short_description" => ['required'],
            "long_description" => ['nullable'],
            "features" => ['nullable'],
            "quantity" => ['nullable', 'integer', 'between:0,1000'],
            "location" => ['required'],
            "active" => ['required'],
            "thumbnail" => ['required', 'image'],
        ]);

        $product = Product::create([
            'name' => Request::get('name'),
            'category_id' => Request::get('category_id'),
            'discount_id' => Request::get('discount_id'),
            'sale_price' => Request::get('sale_price'),
            'is_rentable' => Request::get('is_rentable'),
            'rent_price' => Request::get('rent_price'),
            'weight' => Request::get('weight'),
            'available_colors' => Request::get('available_colors'),
            'cart_description' => Request::get('cart_description'),
            'short_description' => Request::get('short_description'),
            'long_description' => Request::get('long_description'),
            'features' => Request::get('features'),
            'quantity' => Request::get('quantity'),
            'location' => Request::get('location'),
            'active' => Request::get('active'),
            'thumbnail' => Request::file('thumbnail') ? Request::file('thumbnail')->store('products') : null,
        ]);

        if ($product)
            Helper::log('PRODUCT CREATED', "User added product " . $product->name);
        else 
            Helper::log('PRODUCT CREATION ERROR', "Error while creating product " . Request::get('name'));

        return Redirect::route('products')->with('success', 'Product created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all(); 
        $discounts = Discount::all(); 
        return Inertia::render('Admin/Products/Edit', [
            'categories' => $categories,
            'discounts' => $discounts,
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'category_id' => $product->category_id,
                'discount_id' => $product->discount_id,
                'sale_price' => $product->sale_price,
                'is_rentable' => $product->is_rentable,
                'rent_price' => $product->rent_price,
                'weight' => $product->weight,
                'available_colors' => $product->available_colors,
                'cart_description' => $product->cart_description,
                'short_description' => $product->short_description,
                'long_description' => $product->long_description,
                'features' => $product->features,
                'quantity' => $product->quantity,
                'location' => $product->location,
                'active' => $product->active,
                'thumbnail' => $product->thumbnail ? URL::route('image', ['path' => $product->thumbnail, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                'created_at' => $product->created_at,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        Request::validate([
            "name" => ['required', 'max:50', Rule::unique('products')],
            "category_id" => ['required'],
            "discount_id" => ['nullable'],
            "sale_price" => ['required', 'numeric', 'between:1,999999999999999.99'],
            "is_rentable" => ['required'],
            "rent_price" => [ Request::get('is_rentable') ? 'required' : 'nullable', 'numeric' ],
            "weight" => ['nullable', 'numeric'],
            "available_colors" => ['nullable'],
            "cart_description" => ['nullable'],
            "short_description" => ['required'],
            "long_description" => ['nullable'],
            "features" => ['nullable'],
            "quantity" => ['nullable', 'integer', 'between:0,1000'],
            "location" => ['required'],
            "active" => ['required'],
            "thumbnail" => ['image'],
        ]);

        $result = $product->update(Request::only('name', 'category_id', 'discount_id', 'sale_price', 'is_rentable', 'rent_price', 'weight', 'available_colors', 'cart_description', 'short_description', 'long_description', 'features', 'quantity', 'location', 'active'));

        if (Request::file('thumbnail')) {
            $old_image_path = $product->thumbnail; 
            try {
                Storage::delete($old_image_path);
                $product->update(['thumbnail' => Request::file('thumbnail')->store('products')]);
            } catch (\Exception $e) {
                Helper::log('PRODUCT UPDATE ERROR', $e->getMessage(), false);

            } 
        }

        if ($result) 
            Helper::log('PRODUCT UPDATED', "User updated product " . $product->name);

        return Redirect::back()->with('success', 'Product updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->thumbnail) {
            try {
                Storage::delete($product->thumbnail);
            } catch (\Exception $e) {
                Helper::log('PRODUCT DELETE ERROR', $e->getMessage(), false);
            } 
        }
        $result = $product->delete();

        if ($result)
            Helper::log('PRODUCT DELETED', "User deleted product " . $product->name);

        return Redirect::route('products')->with('success', 'Product deleted.');
    }
}
