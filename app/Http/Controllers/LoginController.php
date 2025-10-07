<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Karyawan;
use App\Models\Struktur;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showLoginPage()
    {
        return view('login.login');
    }

    public function loginLogic(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            return redirect()->route('two-factor-login.index'); // Or wherever you redirect after login
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials.'); // Correct message
        }

    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();

        return redirect()->route('index');
    }

    public function showAD()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }

        return view('login.admin-dashboard');
    }

    public function showAP()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }
        $karyawan = Karyawan::all();
        // dd($karyawan);
        return view('login.admin-pegawai', compact('karyawan'));
    }

    public function showAM()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }
        $struktur = Struktur::whereIn('jabatan', ['Site Manager',
         'Astman Project', 'Astman Assurance', 'Astman Provisioning', 'Astman Maintenance',  'Admin Project', 'Admin Project 2', 'Admin Assurance',  'Admin Provisioning', 'Admin Maintenance', 'Admin Logistik'])
            ->orderBy('jabatan', 'desc')
            ->get();
        return view('login.admin-management', compact('struktur'));
    }

    public function showAU()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }
        $user = User::all();
        return view('login.admin-user', compact('user'));
    }

}
