import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Gestion du mode sombre
document.addEventListener('DOMContentLoaded', () => {
    // Vérifier si l'utilisateur a une préférence de mode sombre
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Ajouter un bouton pour basculer le mode sombre
    const darkModeToggle = document.createElement('button');
    darkModeToggle.innerHTML = `
        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
    `;
    darkModeToggle.className = 'fixed bottom-4 right-4 p-2 rounded-full bg-white dark:bg-gray-800 shadow-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-nts-cyan';
    darkModeToggle.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        } else {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        }
    });
    document.body.appendChild(darkModeToggle);
});

Alpine.start();
