<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|max:100',
            'password' => 'required|string'
        ]);

        // dd($data);
        if ( ! Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return back();
        }

        return redirect(route('admin.home'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
