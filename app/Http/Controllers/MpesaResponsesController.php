<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MpesaResponsesController extends Controller
{
    //
    public function validation(Request $request)
    {
        Log::info('Validation endpoint hit!');
        Log::info($request->all());
        
        return [
            'ResultCode' => 0,
            'ResultDec' =>'Accept Service',
        ];
    }

    public function confirmation(Request $request)
    {
        Log::info('Confirmation endpoint hit!');
        Log::info($request->all());
    }
}
