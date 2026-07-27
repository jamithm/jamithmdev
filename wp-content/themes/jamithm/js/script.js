document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || link.target === '_blank') return;

            e.preventDefault();

            // Inicia la transición de vista
            document.startViewTransition(() => {
                window.location.href = href;
            });
        });
    });
});