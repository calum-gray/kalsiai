@extends('layouts.app')

@section('content')
    <section class="health-check-intro hc-step" id="hc-intro">
        <h1>AI Health Check</h1>
        <p>A 5-minute set of questions about where time is currently being lost in your business — admin, customer service, finding information, and repetitive tasks.</p>
    </section>

    <section class="health-check-form-section">

        @if (session('success'))
            <p class="form-success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('health-check.submit') }}" class="health-check-form" id="health-check-form">
            @csrf

            <p class="hc-progress-label" id="hc-progress-label" hidden></p>
            <div
                class="hc-progress"
                id="hc-progress"
                hidden
                role="progressbar"
                aria-label="Survey progress"
                aria-valuemin="0"
                aria-valuemax="100"
                aria-valuenow="0"
            >
                <div class="hc-progress-bar" id="hc-progress-bar"></div>
            </div>

            <div class="hc-step" data-step="start">
                <button type="button" class="btn btn-primary btn-lg" id="hc-start">Start the survey</button>
            </div>

            @foreach ($questions as $index => $question)
                <div
                    class="hc-step hc-question"
                    data-step="question-{{ $index }}"
                    data-question-id="{{ $question['id'] }}"
                    hidden
                >
                    <p class="hc-question-text" id="hc-question-text-{{ $index }}">{{ $question['question'] }}</p>

                    <div class="hc-options" role="group" aria-labelledby="hc-question-text-{{ $index }}">
                        @foreach ($options as $optionIndex => $option)
                            <button type="button" class="hc-option" data-value="{{ $optionIndex + 1 }}">
                                <span class="hc-option-label">{{ $option['label'] }}</span>
                                <span class="hc-option-description">{{ $option['description'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="hc-step hc-results" data-step="results" hidden>
                <p class="hc-results-text">Thanks — that's everything we need.</p>

                <div class="hc-results-fields">
                    <label for="hc-name">Name</label>
                    <input type="text" id="hc-name" name="name" required>

                    <label for="hc-email">Email</label>
                    <input type="email" id="hc-email" name="email" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Get my results</button>
            </div>

            <input type="hidden" name="answers" id="hc-answers-input">
        </form>
    </section>
@endsection
