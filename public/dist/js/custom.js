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

