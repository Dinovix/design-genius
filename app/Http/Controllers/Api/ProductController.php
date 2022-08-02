<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

	/**
	 * Get all products
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$products = Product::all();
		return response()->json($products);
	}


}

