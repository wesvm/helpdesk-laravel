document.addEventListener('DOMContentLoaded', function () {
    const statusBadges = document.getElementsByClassName('task-status');

    const statusColors = {
        'En progreso': 'bg-warning',
        'Cerrado': 'bg-success',
        'Abierto': 'bg-warning',
        'Pendiente': 'bg-primary',
    };

    for (let i = 0; i < statusBadges.length; i++) {
        const status = statusBadges[i].innerText.trim();

        if (statusColors.hasOwnProperty(status)) {
            statusBadges[i].classList.add(statusColors[status]);
        }
    }
});