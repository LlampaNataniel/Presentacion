document.addEventListener('DOMContentLoaded', () => {
    const openBtn = document.getElementById('open-login-btn');
    const modalContainer = document.getElementById('modal-container');
    const closeBtn = document.querySelector('.close-btn');

    // Muestra el modal cuando se hace clic en el botón de acceso
    openBtn.addEventListener('click', () => {
        modalContainer.style.display = 'block';
    });

    // Cierra el modal cuando se hace clic en el botón de cerrar
    closeBtn.addEventListener('click', () => {
        modalContainer.style.display = 'none';
    });

    // Cierra el modal si se hace clic fuera del contenido del formulario
    modalContainer.addEventListener('click', (event) => {
        if (event.target === modalContainer) {
            modalContainer.style.display = 'none';
        }
    });
});