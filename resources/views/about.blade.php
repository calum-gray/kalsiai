@extends('layouts.app')

@section('content')
    <section class="about">
        <h1>About Joanne</h1>
        <p>
            KalsiAI was founded by Joanne Kalsi to help small businesses use AI without the jargon.
            The focus is practical: identify where time is being wasted, choose simple tools,
            implement them safely and measure the benefit.
        </p>
    </section>

    <x-cta-banner
        heading="Ready to save time?"
        subtext="No jargon. No obligation. Just a conversation about what AI can do for your business."
        buttonText="Book a Free 20-Minute Call"
        :buttonUrl="route('contact')"
    />
@endsection
