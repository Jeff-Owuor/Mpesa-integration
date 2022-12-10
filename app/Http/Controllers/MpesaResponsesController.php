<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaResponsesController extends Controller
{
    //
    public function validation(Request $request){
        Log::info('Validation endpoint hit!');
        Log::info($request->all());
    }

    public function confirmation(Request $request){
        Log::info('Confirmation endpoint hit!');
        Log::info($request->all());
    }
}
