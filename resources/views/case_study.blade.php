@extends('layouts.app')

@section('content')
    <section class="case-study">
        <h1>Case Study: HJK Autoservices</h1>

        <div class="case-study-block">
            <h3>Problem</h3>
            <p>Too much time spent entering receipts, creating invoices, finding parts and researching diagnostic codes.</p>
        </div>

        <div class="case-study-block">
            <h3>Solution</h3>
            <p>ChatGPT + Xero/Hubdoc.</p>
        </div>

        <div class="case-study-block">
            <h3>Estimated benefit</h3>
            <p>10&ndash;15 hours saved per month.</p>
        </div>

        <div class="case-study-block">
            <h3>Potential released workshop capacity</h3>
            <p>Up to &pound;6,000 per year, based on 10 hours per month at &pound;50/hour.</p>
        </div>
    </section>

    <x-cta-banner
        heading="See what AI could save your business."
        buttonText="Take the 5-Minute AI Health Check"
        :buttonUrl="route('health-check')"
    />
@endsection
