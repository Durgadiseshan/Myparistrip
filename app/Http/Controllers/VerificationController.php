<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class VerificationController extends Controller
{
    public function sendVerification(Request $request)
    {
        $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

        try {
            $verification = $twilio->verify->v2->services(env('TWILIO_VERIFY_SERVICE_SID'))
                ->verifications
                ->create($request->input('phone_number'), 'sms');
            return response()->json(['success' => true, 'message' => 'Verification code sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function verifyCode(Request $request)
    {
        $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

        try {


                $verificationCheck = $twilio->verify->v2->services(env('TWILIO_VERIFY_SERVICE_SID'))
                ->verificationChecks
                ->create(['code' => $request->input('verification_code'), 'to' => $request->input('phone_number')]);
            



            if ($verificationCheck->status === 'approved') {
                // Perform login and redirect to the dashboard
                $user = User::where('phone_number', $request->input('phone_number'))->first();
                Auth::login($user);

                //return response()->json(['success' => true, 'message' => 'Verification successful']);
               // return view('dashboard')->with('success', 'Verification successful');
               return Redirect::route('dashboard');

            } else {
                return response()->json(['success' => false, 'message' => 'Verification failed']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
