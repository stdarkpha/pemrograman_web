<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {
    // swal error
    echo `
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Koneksi ke database gagal',
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(() => {
                window.location.href = 'index.php?page=contact';
            }, 2000);
        </script>`;
    // redirect to contact page
    die();
}
