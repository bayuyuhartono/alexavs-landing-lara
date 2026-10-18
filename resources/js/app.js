import './portfolio.js';

const pageShell = document.querySelector('.page-shell');

if (pageShell) {
    const updateArtboardScale = () => {
        pageShell.style.setProperty('--artboard-scale', pageShell.clientWidth / 1003);
    };
    updateArtboardScale();
    new ResizeObserver(updateArtboardScale).observe(pageShell);
}

const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
const finePointer = window.matchMedia('(pointer: fine)');
let scrollFrame = null;
let targetScroll = window.scrollY;
let previousTime = 0;

const stopSmoothScroll = () => {
    cancelAnimationFrame(scrollFrame);
    scrollFrame = null;
    previousTime = 0;
};

const animateScroll = (time) => {
    const elapsed = previousTime ? Math.min(time - previousTime, 64) : 16;
    previousTime = time;
    const maximumScroll = Math.max(0, document.documentElement.scrollHeight - window.innerHeight);
    targetScroll = Math.max(0, Math.min(targetScroll, maximumScroll));
    const distance = targetScroll - window.scrollY;

    if (Math.abs(distance) < 1) {
        window.scrollTo({ top: targetScroll, behavior: 'instant' });
        stopSmoothScroll();
        return;
    }

    window.scrollTo({ top: window.scrollY + distance * (1 - Math.exp(-elapsed / 95)), behavior: 'instant' });
    scrollFrame = requestAnimationFrame(animateScroll);
};

window.addEventListener('wheel', (event) => {
    if (document.querySelector('dialog[open]') || reducedMotion.matches || !finePointer.matches || event.ctrlKey || event.metaKey || !event.cancelable || Math.abs(event.deltaX) > Math.abs(event.deltaY)) {
        return;
    }

    // Preserve native wheel handling inside nested scrollable controls.
    for (const element of event.composedPath()) {
        if (!(element instanceof HTMLElement) || element === document.body) {
            continue;
        }
        if (/(auto|scroll)/.test(getComputedStyle(element).overflowY) && element.scrollHeight > element.clientHeight) {
            return;
        }
    }

    event.preventDefault();
    if (scrollFrame === null) {
        targetScroll = window.scrollY;
    }
    const multiplier = event.deltaMode === 1 ? 16 : event.deltaMode === 2 ? window.innerHeight : 1;
    targetScroll += event.deltaY * multiplier;
    targetScroll = Math.max(0, Math.min(targetScroll, document.documentElement.scrollHeight - window.innerHeight));
    if (scrollFrame === null) {
        scrollFrame = requestAnimationFrame(animateScroll);
    }
}, { passive: false });

for (const eventName of ['touchstart', 'pointerdown', 'keydown', 'pagehide']) {
    window.addEventListener(eventName, stopSmoothScroll, { passive: true });
}
reducedMotion.addEventListener('change', stopSmoothScroll);
finePointer.addEventListener('change', stopSmoothScroll);
window.addEventListener('hashchange', stopSmoothScroll);
