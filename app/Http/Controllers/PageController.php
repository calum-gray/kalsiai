<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function about(): View
    {
        return view('about');
    }

    public function caseStudy(): View
    {
        return view('case_study');
    }

    public function healthCheck(): View
    {
        return view('health_check');
    }

    public function contact(): View
    {
        return view('contact');
    }
}
