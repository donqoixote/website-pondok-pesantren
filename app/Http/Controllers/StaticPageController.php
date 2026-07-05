<?php

namespace App\Http\Controllers;

class StaticPageController extends Controller
{
    public function profil()
    {
        return view('pages.profil');
    }

    public function program()
    {
        return view('pages.program');
    }
}
