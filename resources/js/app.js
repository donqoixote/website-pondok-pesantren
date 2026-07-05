document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');

    if (!toggle || !menu) return;

    const openIcon = toggle.querySelector('.menu-open');
    const closeIcon = toggle.querySelector('.menu-close');

    toggle.addEventListener('click', () => {
        const isOpen = !menu.classList.contains('hidden');
        menu.classList.toggle('hidden');
        toggle.setAttribute('aria-expanded', String(!isOpen));
        openIcon?.classList.toggle('hidden');
        closeIcon?.classList.toggle('hidden');
    });
});
