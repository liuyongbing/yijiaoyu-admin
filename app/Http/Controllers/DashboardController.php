<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $adminName = 'Hello World';
        return view('dashboard', [
            'adminName' => $adminName, 
            'menuList' => []
        ]);
    }
}
