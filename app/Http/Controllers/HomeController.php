<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        dd(auth()->user());
        return redirect()->route('courses.index');
    }

}
