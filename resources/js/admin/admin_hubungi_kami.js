
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM Loaded');

    const flashMessageEl = document.getElementById('flash-message');
    if (!flashMessageEl) {
        console.log('Flash message element not found');
        return;
    }

    const successMessage = flashMessageEl.getAttribute('data-success');
    console.log('Success message:', successMessage);

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: successMessage,
            timer: 2000,
            showConfirmButton: true,
        });
    }
});
