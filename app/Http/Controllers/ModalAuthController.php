<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModalAuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'superadmin') {
            return redirect()->route('superadmin.dashboard')->with('success', 'Welcome Superadmin!');
        } else {
            return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
        }
    }

    return back()
        ->withErrors(['email' => 'Email atau password salah!'])
        ->with('openLoginModal', true);
}

    public function logout(Request $request)
    {
        // 🚪 Logout user
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('welcome')
            ->with('success', 'Berhasil logout!');
    }
}
