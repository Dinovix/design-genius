<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('users');

        $users = QueryBuilder::for(User::query())
            ->defaultSort('first_name')
            ->allowedSorts(['first_name', 'last_name', 'email', 'created_at'])
            ->allowedFilters(['first_name', 'last_name', 'email', 'created_at'])
            ->paginate(pageName: 'usersPage')
            ->withQueryString();

        return Inertia::render('Admin/Users/Index', [
            'users'     => $users,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('users')
                ->pageName('usersPage')
                ->defaultSort('first_name')
                ->column(key: 'first_name', searchable: true)
                ->column(key: 'last_name', searchable: true)
                ->column(key: 'email', searchable: true)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
