<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infoLogin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'manager') {
                return redirect('admin/manager');
            } elseif (Auth::user()->role == 'sales') {
                return redirect('admin/sales');
            }
        } else {
            return redirect('')->withErrors('Username dan Password salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
