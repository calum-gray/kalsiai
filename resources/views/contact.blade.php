@extends('layouts.app')

@section('content')
    <section class="contact">
        <h1>Contact</h1>

        <div class="contact-details">
            <p>Joanne Kalsi</p>
            <p>KalsiAI</p>
            <p>
                <a href="{{ config('mail.admin_email') }}">
                    {{ config('mail.admin_email') }}
                </a>
            </p>
        </div>

        @if (session('success'))
            <p class="form-success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}" class="contact-form">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" class="btn btn-primary">Book a call</button>
        </form>

        <p class="health-check-nudge">
            Prefer a self-guided option?
            <a href="{{ route('health-check') }}">
                Take the 5-Minute AI Health Check
            </a>
            instead.
        </p>
    </section>
@endsection
