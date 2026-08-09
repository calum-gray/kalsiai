<?php

namespace App\Http\Controllers;

use App\Notifications\ContactForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:128',
            'email' => 'required|string|email|max:128',
            'message' => 'required|string|max:128',
        ]);

        Notification::route('mail', config('mail.admin_email'))
            ->notify(new ContactForm($validated));

        return back()->with('success', 'Thanks for contacting us!');
    }
}
