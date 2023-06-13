<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            return response()->json(['message' => 'Login successful'], 200);
        } else {
            // Autentikasi gagal
            return response()->json(['message' => 'Invalid username or password'], 401);
        }
    }
}
