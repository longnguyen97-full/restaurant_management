<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserScreenController extends Controller
{
    /**
     * Render page
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Render page
     */
    public function services()
    {
        return view('services');
    }

    /**
     * Render page
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Render page
     */
    public function contact()
    {
        return view('contact');
    }
}
