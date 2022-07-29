<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        InertiaTable::updateQueryBuilderParameters('contacts');

        $contacts = QueryBuilder::for(Contact::query())
            ->defaultSort('name')
            ->allowedSorts(['name', 'is_viewed', 'contact', 'email', 'created_at'])
            ->allowedFilters(['name', 'is_viewed', 'contact', 'email', 'created_at'])
            ->paginate(pageName: 'contactsPage')
            ->withQueryString();

        return Inertia::render('Admin/Contacts/Index', [
            'contacts'     => $contacts,
        ])->table(function (InertiaTable $inertiaTable) {
            $inertiaTable
                ->name('contacts')
                ->pageName('contactsPage')
                ->defaultSort('created_at')
                ->column(key: 'name', searchable: true, sortable: true)
                ->column(key: 'contact', searchable: true)
                ->column(key: 'email', searchable: true, sortable: true)
                ->column(key: 'is_viewed', searchable: true, sortable: true)
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Admin/Contacts/Edit', [
            'contact' => $contact->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return Redirect::route('contacts')->with('success', 'Contact deleted.');
    }
}
