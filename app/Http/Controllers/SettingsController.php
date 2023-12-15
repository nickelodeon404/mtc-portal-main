<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\ActivityLog;
use Twilio\Rest\Client;

class SettingsController extends Controller
{

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required',
            'otp' => 'required|numeric',
        ]);

    // Check if the old password matches the user's current password
    if (!Hash::check($request->old_password, auth()->user()->password)) {
        return redirect()->back()->with('error', 'The old password is incorrect.');
    }

        // Verify OTP using Twilio
        if (!$this->verifyOtp($request->otp, $user->mobile_number)) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Log the activity
        if ($userId !== null) {
            ActivityLog::create([
                'user_id' => $userId,
                'action' => 'password_changed',
                'details' => 'User changed password',
            ]);
        }

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function sendOtp(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'mobile_number' => 'required|numeric',
        ]);
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($validatedData['mobile_number'], "sms");

        // Send OTP via Twilio Verify

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function verifyOtp(Request $request)
    {
        $validatedData = $request->validate([
            'otp' => 'required|numeric',
            'mobile_number' => 'required|numeric',
        ]);

        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create([
                'to' => $validatedData['mobile_number'],
                'code' => $validatedData['otp'],
            ]);

        if ($verification->valid) {
            // Do something when OTP is verified successfully
            return response()->json(['message' => 'OTP verified successfully']);
        } else {
            // Handle invalid OTP
            return response()->json(['error' => 'Invalid OTP'], 422);
        }
    }

    




}
