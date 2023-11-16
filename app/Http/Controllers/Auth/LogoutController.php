<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        try {
            
            auth()->guard('web')->logout();

        } catch (\Throwable $th) {
            return to_route('index')->withToastError('Failed Logout');
        }

        return to_route('login')->withToastSuccess('Logout Berhasil. Selamat Datang Kembali!');
    }
}
