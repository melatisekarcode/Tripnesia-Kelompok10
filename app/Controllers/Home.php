<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Sudah login -> beranda
        if (session()->get('isLoggedIn')) {
            return view('beranda');
        }

        // Belum login -> landing page
        return view('landing_page');
    }
}