<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:api');
	}

	/**
	 * Return a list of all of the contacts.
	 *
	 * @return void
	 */
    public function index()
	{
		$contacts = Contact::all();
		return response()->json($contacts);
	}


	/**
	 * Create a new contact.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$contact = Contact::create($request->all());
		return response()->json($contact);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$contact = Contact::findOrFail($id);
		$contact->update($request->all());
		return response()->json($contact);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contact::destroy($id);
		return response()->json(['message' => 'Contact deleted successfully.']);
	}

	/**
	 *
	 * @return void
	 */
	public function getContacts()
	{
		$contacts = Contact::all();
		return response()->json($contacts);
	}

	/**
	 *
	 * @return void
	 */
	public function getContact($id)
	{
		$contact = Contact::findOrFail($id);
		return response()->json($contact);
	}

	/**
	 *
	 * @return void
	 */
	public function getContactByUser($id)
	{
		$contact = Contact::where('user_id', $id)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return void
	 */
	public function getContactByUserAndContact($id, $id2)
	{
		$contact = Contact::where('user_id', $id)->where('id', $id2)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return void
	 */
	public function getContactByUserAndContactAndType($id, $id2, $id3)
	{
		$contact = Contact::where('user_id', $id)->where('id', $id2)->where('type', $id3)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return void
	 */
	public function getContactByType($type)
	{
		$contact = Contact::where('type', $type)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return void
	 */
	public function getContactByTypeAndUser($type, $id)
	{
		$contact = Contact::where('type', $type)->where('user_id', $id)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return void
	 */
	public function getContactByTypeAndUserAndContact($type, $user_id, $id)
	{
		$contact = Contact::where('type', $type)->where('user_id', $user_id)->where('id', $id)->get();
		return response()->json($contact);
	}

}
