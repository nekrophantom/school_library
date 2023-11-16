<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if(Auth::attempt($credentials, $remember)){
            return to_route('index')->withToastSuccess('Login Berhasil');
        }else{
            return to_route('login')->withToastError('Gagal Login. Harap cek email dan password Anda!');
        }   
    }
}
