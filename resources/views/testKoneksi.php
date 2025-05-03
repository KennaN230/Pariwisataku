<?php
$koneksi = new mysqli("localhost", "root", "", "pariwisataku");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
} else {
    echo "Koneksi berhasil!";
}

$koneksi->close();
?>
