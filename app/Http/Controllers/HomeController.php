<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $data['title'] = 'Dashboard';

        return view('dashboard.admin', $data);
    }
}
