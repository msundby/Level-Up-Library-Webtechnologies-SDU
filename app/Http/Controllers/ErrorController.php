<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ErrorController extends Controller
{
    public function index() {
        return view('errorpage');
    }
    public function knownError($customError) {
        /*
        $user = "uknown";
        if (auth()->user()) {
            $user = auth()->user();
        }
        $error =  array(
            'user' => $user,
            'origin_url' => url()->previous(),
            'errormessage' => $customError,
            'date' => date("M-d-Y")
        );
        $errorJson = json_encode($error);
        */
        //return $customError;
        return view('errorpage', ['error' => $customError]);
    }
}
