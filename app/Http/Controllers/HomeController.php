<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{

    public function index()
    {
        return view('manage.home', ['courses' => Course::where('is_active', 1)->get()]);
    }

}
