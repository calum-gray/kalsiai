@extends('layouts.app')

@section('content')
    <section class="services">
        <h1>Services</h1>

        <div class="pricing-list">
            <div class="pricing-item">
                <h3>AI Health Check</h3>
                <p class="price">Free</p>
            </div>

            <div class="pricing-item">
                <h3>AI Business Review</h3>
                <p class="price">From &pound;250</p>
            </div>

            <div class="pricing-item">
                <h3>AI Setup &amp; Implementation</h3>
                <p class="price">Priced after review</p>
            </div>

            <div class="pricing-item">
                <h3>Ongoing AI Support</h3>
                <p class="price">Monthly packages available</p>
            </div>
        </div>
    </section>

    <section class="faq">
        <h2>Frequently Asked Questions</h2>

        <x-faq-item question="What does the AI Health Check involve?">
            A short, free conversation about where time is currently being lost in your business &mdash; no commitment required.
        </x-faq-item>

        <x-faq-item question="How is pricing decided after the review?">
            The AI Business Review identifies specific opportunities first, so setup is quoted against real, agreed work rather than a generic package.
        </x-faq-item>

        <x-faq-item question="Do I need any technical knowledge?">
            No &mdash; tools and setup are chosen and explained without jargon, and your team is supported through using them.
        </x-faq-item>
    </section>

    <x-cta-banner
        heading="See what AI could save your business."
        buttonText="Book a Free 20-Minute Call"
        :buttonUrl="route('contact')"
    />
@endsection
