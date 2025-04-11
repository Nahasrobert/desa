<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        $page = 'Login Admin';
        return view('auth.login', compact('page')); // Ganti dengan tampilan login Anda
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->is_admin) {
                return redirect('/admin/admin/dashboard')->with('success', 'Berhasil Login sebagai Admin');
            }

            Auth::logout();
            return back()->with('error', 'Anda tidak memiliki akses sebagai Admin.');
        }

        return back()->with('error', 'Email atau Password salah.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully');
    }
}
