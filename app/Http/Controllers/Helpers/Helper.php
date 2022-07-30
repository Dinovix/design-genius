<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Helper extends Controller
{
    /**
     * Function to save users actions 
     *
     * @param string $title
     * @param string $description
     * @return void
     */
    public static function log($title, $description){
        if (Auth::check()){
            $user = Auth::user(); 
            $full_name = $user->first_name . ' ' . $user->last_name ;
            Log::create([
                'user_id' => $user->id,
                'title' => $title,
                'description' =>  $full_name . ' : ' . $description
            ]);
        }
    }
}
