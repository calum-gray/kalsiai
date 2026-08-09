@props(['question'])

<details class="faq-item">
    <summary>{{ $question }}</summary>
    <div class="faq-answer">
        {{ $slot }}
    </div>
</details>
