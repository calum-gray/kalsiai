<?php

namespace App\Http\Controllers;

use App\Notifications\ContactForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class HealthCheckController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        //
    }
}
