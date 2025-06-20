<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("session/index");
    }

    // LOGIN 
    function login(Request $request)
    {
        session()->flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'username wajib diisi',
            'password.required' => 'password wajib diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/donasi');
        } else {
            return redirect()->back()->with('errorHeader', 'Login Gagal')->with('error', 'Harap periksa kembali username dan password Anda.');
        }
    }

    // LOGOUT - NAVBAR
    function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect ke halaman utama atau halaman login
    }

    // REGISTER TAMPIL
    function register()
    {
        return view('session/register');
    }

    // REGISTER DATA
    function create(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'username wajib diisi',
            'username.unique' => 'username sudah digunakan',
            'password.required' => 'password wajib diisi'
        ]);

        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ];

        $userAda = User::where('username', $request->username)->first();

        // JIKA GAGAL
        if ($userAda) {
            return redirect()->back()->with('errorHeader', 'Registrasi Gagal')->with('error', 'Username sudah digunakan, harap gunakan username lain untuk melanjutkan.');
        }

        User::create($data);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/donasi');
        }
    }
}
