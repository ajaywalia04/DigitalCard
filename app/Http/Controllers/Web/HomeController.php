<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function privacy()
    {
        return view("web/privacy");
    }

    public function terms()
    {
        return view("web/terms");
    }
}
