<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\DocumentType;
use App\Models\RecordRequest;
use Illuminate\Support\Facades\Auth;

class SMSController extends Controller
{
    public function sendSms(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            "mobile_number" => "required",
            "message_date" => "required",
            "message_time" => "required",
            "message_transactNo" => "required",
            "message" => "required",
        ]);

        // Get the validated data
        $message = $validatedData['message'] . ' ' . $validatedData['message_date'] . ' ' . $validatedData['message_time'] .  ' ' . $validatedData['message_transactNo'];
        $mobileNumber = $validatedData['mobile_number'];

        // Get Twilio credentials from the environment
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

        // Initialize the Twilio client
        $twilio = new Client($twilioSid, $twilioAuthToken);

        // Send SMS to the user
        try {
            $twilio->messages->create(
                $mobileNumber,
                [
                    'from' => $twilioPhoneNumber,
                    'body' => $message,
                ]
            );


            return redirect()->route('academic_record_request_table')->with('success', 'SMS sent successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'SMS could not be sent. Please try again.');
        }
    }
}