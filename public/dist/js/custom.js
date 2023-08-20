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

// Mendapatkan referensi elemen alert
var alertMessage = document.getElementById("alertMessage");

// Cek apakah elemen alert ditemukan
if (alertMessage) {
  // Mengatur timeout untuk menghilangkan elemen alert setelah 3 detik
    setTimeout(function() {
        alertMessage.style.display = "none";
    }, 3000);
}


