<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TwoFactorLoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (!Session::has('two_factor_sent')) {
                $code = random_int(100000, 999999);
                $user->two_factor_login_code = $code;

                try {
                    $user->save();

                    try {
                        Mail::raw("Ini adalah kode verifikasi anda, jangan memberitahukan kode ini kepada siapapun $code", function ($message) use ($user) {
                            if ($user && $user->email) {
                                $message->to($user->email)->subject('Kode Verifikasi');
                            } else {
                                Log::error("User or user email is null in two-factor email sending. User: " . ($user ? $user->toJson() : 'null'));
                            }
                        });
                        Session::put('two_factor_sent', true);
                    } catch (\Exception $emailException) {
                        Log::error("Error sending two-factor email: " . $emailException->getMessage());
                        return back()->with('error', 'Failed to send verification code. Please try again later.');
                    }
                } catch (\Exception $saveException) {
                    Log::error("Error saving user: " . $saveException->getMessage());
                    return back()->with('error', 'Failed to save user data. Please try again later.');
                }
            }
            return view('login.two-factor-login');
        } else {
            return redirect()->guest(route('login'));
        }
    }

    public function resend(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $code = random_int(100000, 999999);
            $user->two_factor_login_code = $code;

            try {
                $user->save();

                try {
                    Mail::raw("Ini adalah kode verifikasi anda, jangan memberitahukan kode ini kepada siapapun $code", function ($message) use ($user) {
                        if ($user && $user->email) {
                            $message->to($user->email)->subject('Kode Verifikasi');
                        } else {
                            Log::error("User or user email is null in two-factor email sending. User: " . ($user ? $user->toJson() : 'null'));
                        }
                    });
                    Session::put('two_factor_sent', true);
                    return back()->with('success', 'New verification code sent!');
                } catch (\Exception $emailException) {
                    Log::error("Error sending two-factor email: " . $emailException->getMessage());
                    return back()->with('error', 'Failed to send verification code. Please try again later.');
                }
            } catch (\Exception $saveException) {
                Log::error("Error saving user: " . $saveException->getMessage());
                return back()->with('error', 'Failed to save user data. Please try again later.');
            }
        } else {
            return redirect()->guest(route('login'));
        }
    }


    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|integer',
        ]);

        if (Auth::check()) {
            $user = Auth::user();

            if ($request->code == $user->two_factor_login_code) {
                Session::put('two_factor_login_authenticated', true);
                $user->two_factor_login_code = null;
                $user->save();
                Session::forget('two_factor_sent');

                return redirect()->intended(route('showAD'));
            }
            return back()->withErrors(['code' => 'Kode verifikasi Salah']);
        } else {
            return redirect()->guest(route('login'));
        }
    }
}
