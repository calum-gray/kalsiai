<footer class="site-footer">
    <div class="footer-links">
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('case_study') }}">Case Study</a>
        <a href="{{ route('health-check') }}">AI Health Check</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <div class="footer-contact">
        <a href="mailto:{{ config('mail.admin_email') }}">{{ config('mail.admin_email') }}</a>
    </div>

    <p class="footer-meta">
        KalsiAI · © {{ now()->year }}
    </p>
</footer>
