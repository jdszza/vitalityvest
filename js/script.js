// script.js
function showScreen(screenId) {
    document.querySelectorAll('div[id$="-screen"]').forEach(screen => {
        screen.classList.add('hidden');
    });
    document.getElementById(screenId).classList.remove('hidden');
}


// Inicializa a primeira tela como Splash Screen
showScreen('splash-screen');

// Timer para transição da Splash Screen para a Tela de Login
setTimeout(() => {
    showScreen('login-screen');
}, 4000);

