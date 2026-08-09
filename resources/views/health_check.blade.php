@extends('layouts.app')

@section('content')
    <section class="health-check-intro">
        <h1>AI Health Check</h1>
        <p>
            A 5-minute set of questions about where time is currently being lost in your business — admin, customer service, finding information, and repetitive tasks.
        </p>
    </section>

    <form method="POST" action="{{ route('health-check.submit') }}" class="health-check-form">
        @csrf

        {{--
            Placeholder — the real question set goes here later, grouped
            by the four "What KalsiAI does" themes so results can map
            straight back to them:

              - Admin time      (emails, invoices, reports, paperwork)
              - Customer service (reply times, communication, FAQs)
              - Finding information (research, parts, suppliers, documents)
              - Repetitive tasks (manual work that could be automated)

            Each question likely becomes its own <fieldset>, e.g. a
            frequency scale (Never / Sometimes / Often / Constantly)
            rather than free text, so results can be quantified.
        --}}

        <button type="submit" class="btn btn-primary">Get my results</button>
    </form>
@endsection
