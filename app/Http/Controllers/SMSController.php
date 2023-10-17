<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Enrolled;
use Illuminate\Http\RedirectResponse;

class SMSController extends Controller
{
    public function sendsms(Request $request)
    {
        $validatedData = $request->validate([

            "mobile_number" => "required",     
        ]);

        $message = $request->message;

    	Enrolled::create([
  
            "mobile_number" => $validatedData['mobile_number'],

        ]);

        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $sendernumber = getenv("TWILIO_PHONE_NUMBER");

        $twilio = new Client($sid, $token);

        $message = $twilio->messages
                          ->create($validatedData['mobile_number'],
                            [
                                "body" => $message,
                                "from" => $sendernumber
                            ]
                        );
    }
}
