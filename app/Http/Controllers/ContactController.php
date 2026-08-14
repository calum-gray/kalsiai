<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\ContactForm;
use App\Notifications\ContactFormNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function submit(ContactFormRequest $request): RedirectResponse
    {
        $submission = ContactForm::create($request->validated());

        Notification::route('mail', config('mail.admin_email'))
            ->notify(new ContactFormNotification($submission));

        return back()->with('success', 'Thanks for contacting us!');
    }
}
