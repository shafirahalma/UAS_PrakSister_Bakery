<?php
//downlaod_member
include "config/config.php";

if (isset($_GET['username']) && isset($_GET['nama']) && isset($_GET['tgl_lahir']) && isset($_GET['alamat']) && isset($_GET['asal_kota']) && isset($_GET['telepon']) && isset($_GET['jk'])) {
    $username = $_GET['username'];
    $nama = $_GET['nama'];
    $tgl_lahir = $_GET['tgl_lahir'];
    $alamat = $_GET['alamat'];
    $asal_kota = $_GET['asal_kota'];
    $telepon = $_GET['telepon'];
    $jk = $_GET['jk'];

    // Tentukan nama file untuk diunduh
    $filename = 'data_member_' . $username . '.txt';

    // Buat isi teks file
    $filecontent = "Username: " . $username . "\n";
    $filecontent .= "Nama: " . $nama . "\n";
    $filecontent .= "Tanggal Lahir: " . $tgl_lahir . "\n";
    $filecontent .= "Alamat: " . $alamat . "\n";
    $filecontent .= "Asal Kota: " . $asal_kota . "\n";
    $filecontent .= "Telepon: " . $telepon . "\n";
    $filecontent .= "Jenis Kelamin: " . $jk . "\n";

    // Tentukan header konten
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Tampilkan isi teks file
    echo $filecontent;
    exit;
} else {
    // Jika parameter tidak lengkap, redirect kembali ke halaman data member
    header('Location: home.php?page=member');
    exit;
}
