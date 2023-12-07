<?php
//downlaod_resep

include "config/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data resep berdasarkan ID
    $query = "SELECT * FROM resep WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $gambar = $row['gambar'];

        // Tentukan header konten
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $gambar . '"');
        header('Content-Length: ' . filesize('gambar_resep/' . $gambar));

        // Baca dan kirimkan isi gambar ke output
        readfile('gambar_resep/' . $gambar);
        exit;
    } else {
        // Jika data tidak ditemukan, redirect kembali ke halaman data resep
        header('Location: home.php?page=data_resep');
        exit;
    }
} else {
    // Jika parameter ID tidak ada, redirect kembali ke halaman data resep
    header('Location: home.php?page=data_resep');
    exit;
}
