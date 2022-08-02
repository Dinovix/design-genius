<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{

	public function __construct()
	{
		//$this->middleware('auth.api');
	}

	/**
	 * Return a list of all of the contacts.
	 *
	 * @return \Illuminate\Http\JsonResponse
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
		$contact = array();
		$contact['name'] = $request->first_name . " " . $request->last_name;
		$contact['email'] = $request->email;
		$contact['contact'] = $request->contact;
		$contact['description'] = $request->description;

		try {

			//$contact->save();
			$contact = Contact::create($contact);
			mail("kapolw@gmail.com", 'Contact Us | DesignGenius Website', $contact->description . "\n---\n\n" ."Sender: ". $contact->name . "\n" . $contact->email . "\n" . $contact->contact);

			// return  ($request->error) ? redirect()->route('web.contact')->with("success", "Your message has been sent successfully !") : response()->json($contact);
			return   redirect()->route('web.contact')->with("success", "Your message has been sent successfully !");

		} catch (\Exception $e) {

			return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
			// redirect()->route('web.contact')->with('error' , $e->getMessage()) : response()->json(['status' => 'error', 'message' => $e->getMessage()]);

		}

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
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContacts()
	{
		$contacts = Contact::all();
		return response()->json($contacts);
	}

	/**
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContact($id)
	{
		$contact = Contact::findOrFail($id);
		return response()->json($contact);
	}

	/**
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContactByUser($user_id)
	{
		$contact = Contact::where('user_id', $user_id)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContactByUserAndContact($id, $id2)
	{
		$contact = Contact::where('user_id', $id)->where('id', $id2)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContactByUserAndContactAndType($id, $id2, $id3)
	{
		$contact = Contact::where('user_id', $id)->where('id', $id2)->where('type', $id3)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContactByType($type)
	{
		$contact = Contact::where('type', $type)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContactByTypeAndUser($type, $id)
	{
		$contact = Contact::where('type', $type)->where('user_id', $id)->get();
		return response()->json($contact);
	}

	/**
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getContactByTypeAndUserAndContact($type, $user_id, $id)
	{
		$contact = Contact::where('type', $type)->where('user_id', $user_id)->where('id', $id)->get();
		return response()->json($contact);
	}

}
