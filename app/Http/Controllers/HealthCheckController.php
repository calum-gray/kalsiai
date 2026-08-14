<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthCheckRequest;
use App\Models\HealthCheck;
use App\Notifications\HealthCheckNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;

class HealthCheckController extends Controller
{
    public function submit(HealthCheckRequest $request): RedirectResponse
    {
        $submission = HealthCheck::create($request->validated());

        Notification::route('mail', config('mail.admin_email'))
            ->notify(new HealthCheckNotification($submission));

        return back()->with('success', 'Thanks - your results will be with you shortly');
    }
    //TODO add results page
}
