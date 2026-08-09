@props(['number', 'title'])

<div class="step">
    <span class="step-number">{{ $number }}</span>
    <h3 class="step-title">{{ $title }}</h3>
    <p class="step-description">{{ $slot }}</p>
</div>
