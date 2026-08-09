@extends('layouts.app')

@section('content')

    <section class="hero">
        <h1>Work Smarter. Grow Faster. AI for Business.</h1>
        <p class="hero-subtext">Practical AI support for small businesses that want to save time, reduce admin and improve productivity.</p>

        <div class="hero-actions">
            <a href="{{ route('health-check') }}" class="btn btn-primary">Take the 5-Minute AI Health Check</a>
            <a href="{{ route('contact') }}" class="btn btn-secondary">Book a Free 20-Minute Call</a>
        </div>
    </section>

    <section class="what-we-do">
        <h2>What KalsiAI does</h2>

        <div class="info-box-grid">
            <x-info-box title="Save Admin Time">
                Emails, invoices, reports, paperwork.
            </x-info-box>

            <x-info-box title="Improve Customer Service">
                Quicker replies, clearer communication, FAQs.
            </x-info-box>

            <x-info-box title="Find Information Faster">
                Research, parts, suppliers, documents.
            </x-info-box>

            <x-info-box title="Automate Repetitive Tasks">
                Reduce manual work and free up staff time.
            </x-info-box>
        </div>
    </section>

    <section class="how-it-works">
        <h2>How it works</h2>

        <div class="step-list">
            <x-step number="1" title="Understand your business">
                Short health check or consultation.
            </x-step>

            <x-step number="2" title="Identify quick wins">
                Practical AI opportunities with costs and expected savings.
            </x-step>

            <x-step number="3" title="Help you implement them">
                Setup, prompts, staff support and review.
            </x-step>
        </div>
    </section>

    <section class="case-study-teaser">
        <h2>Example: HJK Autoservices</h2>
        <p>Too much time spent entering receipts, creating invoices, finding parts and researching diagnostic codes &mdash; solved with ChatGPT + Xero/Hubdoc, saving 10&ndash;15 hours per month.</p>
        <a href="{{ route('case_study') }}" class="link-arrow">Read the full case study &rarr;</a>
    </section>

    <section class="trust">
        <ul class="trust-list">
            <li>Friendly expert support</li>
            <li>Clear AI solutions</li>
            <li>Improved productivity</li>
            <li>Automated processes</li>
            <li>Safe &amp; responsible AI</li>
            <li>Trusted partner for growth</li>
        </ul>
    </section>

    <x-cta-banner
        heading="See what AI could save your business."
        buttonText="Book a Free 20-Minute Call"
        :buttonUrl="route('contact')"
    />

@endsection
