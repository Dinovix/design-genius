<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/user/premium/', function (Request $request) {

	$res = DB::update('update users set is_premium = ? where id = ?', [ $request->premium == true, $request->id]);
	return $res && ($request->premium == true) ?  "You are now a premium member": (($request->premium == true) ? "Oups!, something went wrong" : "Switched to normal account successfully") ;

})->name("api.user-premium.update");
