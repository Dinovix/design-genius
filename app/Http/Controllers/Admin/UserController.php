<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

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
        return Inertia::render('Admin/Users/Create');
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
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'password' => ['nullable'],
            'gender' => ['nullable'],
            'country' => ['nullable'],
            'town' => ['nullable'],
            'phone' => ['nullable'],
            'is_admin' => ['required', 'boolean'],
            'photo' => ['nullable', 'image'],
        ]);

        User::create([
            'first_name' => Request::get('first_name'),
            'last_name' => Request::get('last_name'),
            'email' => Request::get('email'),
            'password' => Request::get('password'),
            'is_admin' => Request::get('is_admin'),
            'gender' => Request::get('gender'),
            'country' => Request::get('country'),
            'town' => Request::get('town'),
            'phone' => Request::get('phone'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'profile_photo_path' => Request::file('photo') ? Request::file('photo')->store('users') : null,
        ]);

        return Redirect::route('users')->with('success', 'User created.');
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
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'gender' => $user->gender,
                'country' => $user->country,
                'town' => $user->town,
                'phone' => $user->phone,
                'is_admin' => $user->id_admin,
                'photo' => $user->profile_photo_path ? URL::route('image', ['path' => $user->profile_photo_path, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                'created_at' => $user->created_at,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Request::validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'gender' => ['nullable'],
            'country' => ['nullable'],
            'town' => ['nullable'],
            'password' => ['nullable'],
            'phone' => ['nullable', 'numeric'],
            'is_admin' => ['required', 'boolean'],
            'photo' => ['nullable', 'image'],
        ]);

        $user->update(Request::only('first_name', 'last_name', 'email', 'is_admin', 'gender', 'country', 'town', 'phone'));

        if (Request::file('photo')) {
            $old_image_path = $user->profile_photo_path; 
            try {
                $res = Storage::delete($old_image_path);
            } catch (\Throwable $th) {
                //throw $th;
                // TODO : Logs errors
            } 
            $user->update(['profile_photo_path' => Request::file('photo')->store('users')]);
        }

        if (Request::get('password')) {
            $user->update(['password' => Request::get('password')]);
        }

        return Redirect::back()->with('success', 'User updated.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->is_admin) {
            return Redirect::back()->with('error', 'Deleting is not allowed.');
        }

        try {
            $res = Storage::delete($user->profile_photo_path);
        } catch (\Throwable $th) {
            //throw $th;
            // TODO : Logs errors
        } 
        $user->delete();

        return Redirect::route('users')->with('success', 'User deleted.');
    }
}
