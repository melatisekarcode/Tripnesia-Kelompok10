<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        return view('profile');
    }

    public function edit()
    {
        return view('editprofile');
    }
}