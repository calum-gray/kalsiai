<?php

namespace App\Http\Controllers;

use App\Notifications\HealthCheck;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;

class HealthCheckController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'answers' => 'required|json',
        ]);

        Notification::route('mail', config('mail.admin_email'))
            ->notify(new HealthCheck($validated));

        return back()->with('success', 'Thanks - your results will be with you shortly');
    }
    //TODO add results page
}
