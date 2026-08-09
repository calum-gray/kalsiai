<header class="site-header">
    <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('images/logo.svg') }}" alt="KalsiAI">
    </a>

    <button class="nav-toggle" aria-label="Menu" aria-expanded="false">
        &#9776;
    </button>

    <nav class="site-nav">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>

        <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">
            Services
        </a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
            About
        </a>
        <a href="{{ route('case_study') }}" class="{{ request()->routeIs('case-study') ? 'active' : '' }}">
            Case Study
        </a>
        <a href="{{ route('health-check') }}" class="cta {{ request()->routeIs('health-check') ? 'active' : '' }}">
            AI Health Check
        </a>
        <a href="{{ route('contact') }}" class="cta {{ request()->routeIs('contact') ? 'active' : '' }}">
            Book a call
        </a>
    </nav>
</header>
