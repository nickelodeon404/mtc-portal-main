<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Models\ActivityLog;
use App\Models\Enrolled;
use Twilio\Rest\Client;

class SettingsController extends Controller
{
    
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'otp' => 'required|numeric',
        ]);

        // Check if the old password matches the user's current password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect.');
        }

        // Check if the entered OTP matches the one sent
        $otpKey = "otp_{$user->phone}";
        $storedOtp = Cache::get($otpKey);

        if (!$storedOtp || $request->otp != $storedOtp) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Log the activity
        ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'password_changed',
            'details' => 'User changed password',
        ]);

        // Clear the OTP from the cache
        Cache::forget($otpKey);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function sendOtp(Request $request)
    {
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'mobile_number' => 'required|numeric|digits:10',
        ]);

        $otp = rand(100000, 999999);
        $phoneNumber = $request->mobile_number;

        // Store the OTP in the cache with a 5-minute expiration
        Cache::put("otp_{$phoneNumber}", $otp, now()->addMinutes(5));

        // Send OTP via Twilio Verify
        $this->sendTwilioVerify($phoneNumber, $otp);

        return response()->json(['message' => 'OTP sent successfully']);
    }

    private function sendTwilioVerify($to, $otp)
    {
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilioSid = getenv("TWILIO_SID");
        $twilioVerifySid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilioSid, $token);

        $verification = $twilio->verify->v2->services($twilioVerifySid)
            ->verifications
            ->create($to, "sms", [
                'body' => "Your OTP for password change: $otp",
            ]);
    }

    
}
