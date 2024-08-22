// script.js
function showScreen(screenId) {
    document.querySelectorAll('div[id$="-screen"]').forEach(screen => {
        screen.classList.add('hidden');
    });
    document.getElementById(screenId).classList.remove('hidden');
}

document.querySelector('.show-password').addEventListener('click', function () {
    const senhaInput = document.getElementById('senha');
    if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
    } else {
        senhaInput.type = 'password';
    }
});

// Inicializa a primeira tela como Splash Screen
showScreen('splash-screen');

// Timer para transição da Splash Screen para a Tela de Login
setTimeout(() => {
    showScreen('login-screen');
}, 4000);

