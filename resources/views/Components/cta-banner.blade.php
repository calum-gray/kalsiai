@props(['heading', 'subtext' => null, 'buttonText', 'buttonUrl'])

<section class="cta-banner">
    <h2>{{ $heading }}</h2>

    @if ($subtext)
    <p>{{ $subtext }}</p>
    @endif

    <a href="{{ $buttonUrl }}" class="btn btn-primary">{{ $buttonText }}</a>
</section>
