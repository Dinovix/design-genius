<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('orders');

        $orders = QueryBuilder::for(Order::class)
            ->defaultSort('created_at')
            ->allowedIncludes(['user'])
            ->select('orders.id', 'orders.total_price',
            DB::raw("concat(users.last_name, ' ', users.first_name) as full_name"),
            'orders.paid', 'orders.shipped', 'orders.created_at', 'users.email')
            ->join('users', 'orders.id', '=', 'users.id')
            ->allowedSorts(['full_name', 'total_price', 'paid', 'shipped', 'email', 'created_at'])
            ->allowedFilters(['full_name', 'total_price', 'paid', 'shipped', 'email', 'created_at'])
            ->paginate(pageName: 'ordersPage')
            ->withQueryString();

        return Inertia::render('Admin/Orders/Index', [
            'orders'     => $orders,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('orders')
                ->pageName('ordersPage')
                ->defaultSort('created_at')
                ->column(key: 'full_name', label: 'client', searchable: true)
                ->column(key: 'email', label:'Client Email', searchable: true)
                ->column(key: 'total_price', searchable: true)
                ->column(key: 'paid', searchable: true)
                ->column(key: 'shipped', searchable: true)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products = [];
        $user = User::find($order->user_id);
        
        $sponsor = User::find($order->sponsored_by);
        $sponsor_info = '';
        if ($sponsor)
            $sponsor_info = $sponsor->first_name . ' ' . $sponsor->last_name . ' | ' . $sponsor->email ; 

        $order_products = OrderProduct::with(['product'])->where('order_id', $order->id)->get();
        foreach( $order_products as $order_product ){
            array_push($products, 
                array_merge(
                    $order_product->product->toArray(),
                    array(
                        'order_quantity' => $order_product->quantity ,  
                        'order_price' => $order_product->price , 
                        'order_discount_amount' => $order_product->discount_amount ,
                        'order_type' => $order_product->type
                    )
                )
            );
        }
        $order = $order->toArray(); 
        return Inertia::render("Admin/Orders/Edit", [
            'user' => [
                'full_name' => $user->last_name . ' ' . $user->first_name , 
                'id' => $user->id, 
                'email' => $user->email
            ], 
            'order' => $order,
            'products' => $products,
            'sponsor_info' => $sponsor_info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        Request::validate([
            "phone" => ['nullable'],
            "po_box" => ['nullable'],
            "city" => ['nullable'],
            "delivery_address" => ['nullable'],
            "paid" => ['required'],
            "shipped" => ['required'],
        ]);

        $order->update(Request::only('phone', 'po_box', 'city', 'delivery_address', 'paid', 'shipped'));

        return Redirect::back()->with('success', 'Order updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return Redirect::route('orders')->with('success', 'Order deleted.');
    }
}
