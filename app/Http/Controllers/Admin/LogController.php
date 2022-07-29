<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;

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

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('contacts');

        $logs = QueryBuilder::for(Log::class)
            ->defaultSort('created_at')
            ->allowedIncludes(['user'])
            ->select('logs.id', 'logs.title',
            DB::raw("concat(users.last_name, ' ', users.first_name) as full_name"),
            'logs.description', 'logs.created_at', 'logs.email')
            ->join('users', 'logs.user_id', '=', 'users.id')
            ->allowedSorts(['full_name', 'title', 'email', 'created_at'])
            ->allowedFilters(['full_name', 'title', 'email', 'created_at'])
            ->paginate(pageName: 'logsPage')
            ->withQueryString();

        return Inertia::render('Admin/Logs/Index', [
            'logs'     => $logs,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('logs')
                ->pageName('logsPage')
                ->defaultSort('created_at')
                ->column(key: 'full_name', searchable: true, sortable: true)
                ->column(key: 'email', searchable: true, sortable: true)
                ->column(key: 'title', searchable: true, sortable: true)
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
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        return Inertia::render('Admin/Logs/Edit', [
            'log' => $log->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
