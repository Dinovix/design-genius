<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

use function Pest\Laravel\json;

class IsAuthenticatedAPI
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		// check api token
		$api_token = $request->header('X-API-TOKEN');

		if (!$api_token || $api_token != csrf_token()) {
			return response()->json(['error' => 'Missing or Invalid API token'], 401);
		}else  {
			return $next($request);
		}

	}
}
