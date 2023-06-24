$(document).ready(function () {
    $('.dtTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    // Editor
    $('.text-editor').summernote()
});

function submitForm() {
    document.getElementById("myForm").submit();
}

// Menghapus pesan alert setelah 3 detik
setTimeout(function() {
    var alertMessage = document.getElementById('alertMessage');
    if (alertMessage) {
        alertMessage.classList.add('fade-out');
        setTimeout(function() {
            alertMessage.remove();
        }, 300); // Waktu tambahan untuk menunggu transisi selesai
    }
}, 1500);
