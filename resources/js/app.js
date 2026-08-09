
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.site-nav');

    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', isOpen);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('main section');

    if (!sections.length || !('IntersectionObserver' in window)) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    sections.forEach((section) => observer.observe(section));
});

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('health-check-form');
    if (!form) return;

    const FADE_MS = 450; // keep in sync with --transition-medium in tokens.css

    const startStep = form.querySelector('[data-step="start"]');
    const questionSteps = Array.from(form.querySelectorAll('.hc-question'));
    const resultsStep = form.querySelector('[data-step="results"]');
    const startButton = document.getElementById('hc-start');
    const progressWrap = document.getElementById('hc-progress');
    const progressBar = document.getElementById('hc-progress-bar');
    const progressLabel = document.getElementById('hc-progress-label');
    const answersInput = document.getElementById('hc-answers-input');
    const introSection = document.getElementById('hc-intro');

    if (!startStep || !resultsStep || !startButton || !progressWrap || !progressBar || !progressLabel || !answersInput || !questionSteps.length) {
        console.error('AI Health Check: one or more expected elements are missing from the page — check the data-step attributes and ids in health-check.blade.php still match app.js.');
        return;
    }

    const answers = {};

    function showStep(step) {
        step.hidden = false;
        step.classList.add('hc-fade-init');
        void step.offsetWidth; // force a reflow so the browser registers the "from" state
        step.classList.remove('hc-fade-init');
        step.classList.add('hc-fade-in');
    }

    function hideStep(step, then) {
        step.classList.remove('hc-fade-in');
        step.classList.add('hc-fade-out');

        setTimeout(() => {
            step.hidden = true;
            step.classList.remove('hc-fade-out');
            if (then) then();
        }, FADE_MS);
    }

    function updateProgress(index) {
        const percent = Math.round(((index + 1) / questionSteps.length) * 100);
        progressBar.style.width = percent + '%';
        progressWrap.setAttribute('aria-valuenow', percent);
        progressLabel.textContent = `Question ${index + 1} of ${questionSteps.length}`;
    }

    function goToQuestion(index) {
        updateProgress(index);
        showStep(questionSteps[index]);
    }

    startButton.addEventListener('click', () => {
        if (introSection) hideStep(introSection);

        hideStep(startStep, () => {
            progressWrap.hidden = false;
            progressLabel.hidden = false;
            goToQuestion(0);
        });
    });

    questionSteps.forEach((step, index) => {
        step.querySelectorAll('.hc-option').forEach((button) => {
            button.addEventListener('click', () => {
                answers[step.dataset.questionId] = button.dataset.value;

                const isLastQuestion = index === questionSteps.length - 1;

                hideStep(step, () => {
                    if (isLastQuestion) {
                        progressWrap.hidden = true;
                        progressLabel.hidden = true;
                        answersInput.value = JSON.stringify(answers);
                        showStep(resultsStep);
                    } else {
                        goToQuestion(index + 1);
                    }
                });
            });
        });
    });
});
