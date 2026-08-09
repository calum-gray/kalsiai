@props(['title'])

<div class="info-box">
    <h3 class="info-box-title">{{ $title }}</h3>
    <p class="info-box-description">{{ $slot }}</p>
</div>
