const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// Menghapus pesan alert setelah 3 detik
setTimeout(function() {
    var alertMessage = document.getElementById('alertMessage');
    if (alertMessage) {
        alertMessage.classList.add('fade-out');
        setTimeout(function() {
            alertMessage.remove();
        }, 300); // Waktu tambahan untuk menunggu transisi selesai
    }
}, 2500);