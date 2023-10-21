document.addEventListener('DOMContentLoaded', function () {
    const statusBadges = document.getElementsByClassName('task-status');

    const statusColors = {
        'En progreso': 'bg-success',
        'Cerrado': 'bg-primary',
        'Abierto': 'bg-primary',
        'Pendiente': 'bg-warning',
    };

    for (let i = 0; i < statusBadges.length; i++) {
        const status = statusBadges[i].innerText.trim();

        if (statusColors.hasOwnProperty(status)) {
            statusBadges[i].classList.add(statusColors[status]);
        }
    }
});