<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('services');
    }
}
