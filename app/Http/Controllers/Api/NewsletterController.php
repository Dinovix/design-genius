<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:api');
	}

	/**
	 *
	 * @return Response
	 */
	public function index()
	{
		$newsletters = Newsletter::all();
		return response()->json($newsletters);
	}

	/**
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$newsletter = Newsletter::create($request->all());
		return response()->json($newsletter);
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$newsletter = Newsletter::findOrFail($id);
		$newsletter->update($request->all());
		return response()->json($newsletter);
	}

	/**
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$newsletter = Newsletter::findOrFail($id);
		$newsletter->delete();
		return response()->json($newsletter);
	}

	/**
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function search(Request $request)
	{
		$newsletters = Newsletter::where('email', 'like', '%' . $request->search . '%')->get();
		return response()->json($newsletters);
	}

	/**
	 *
	 * @return Response
	 */
	public function getUniqueEmails()
	{
		$newsletters = Newsletter::select('email')->distinct()->get();
		return response()->json($newsletters);
	}


}
