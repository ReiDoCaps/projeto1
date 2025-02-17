// Estilo do menu.js
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('header');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('rolar');
        } else {
            header.classList.remove('rolar');
        }
    });
});
