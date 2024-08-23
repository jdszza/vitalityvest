document.addEventListener('DOMContentLoaded', function() {
    const emergencyButton = document.querySelector('.emergency-button');
    const confirmationCard = document.getElementById('confirmation-card');
    const confirmButton = document.getElementById('confirm-emergency');
    const cancelButton = document.getElementById('cancel-emergency');
    const notificationCard = document.getElementById('notification-card');
    const notificationMessage = document.getElementById('notification-message');
    const closeNotificationButton = document.getElementById('close-notification');

    emergencyButton.addEventListener('click', function() {
        // Mostra o card de confirmação
        confirmationCard.style.display = 'block';
    });

    confirmButton.addEventListener('click', function() {
        fetch('../php/backemergencia.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: 'activate_emergency' })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Emergência ativada com sucesso!', true);
            } else {
                showNotification('Erro ao ativar emergência: ' + data.error, false);
            }
            // Oculta o card de confirmação após a confirmação
            confirmationCard.style.display = 'none';
        })
        .catch(error => {
            showNotification('Erro na requisição: ' + error.message, false);
        });
    });

    cancelButton.addEventListener('click', function() {
        // Oculta o card de confirmação sem chamar o PHP
        confirmationCard.style.display = 'none';
    });

    closeNotificationButton.addEventListener('click', function() {
        // Oculta o card de notificação
        notificationCard.style.display = 'none';
    });

    function showNotification(message, isSuccess) {
        notificationMessage.textContent = message;
        notificationCard.classList.toggle('success', isSuccess);
        notificationCard.style.display = 'block';
    }
});
