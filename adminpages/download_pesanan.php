<?php
//downlaod_pesanan

include "config/config.php";

// Mendapatkan data dari parameter
$kode = $_GET['kode'];
$username = $_GET['username'];
$tgl = $_GET['tgl'];
$kue = $_GET['kue'];
$jumlah = $_GET['jumlah'];
$total_bayar = $_GET['total_bayar'];
$keterangan = $_GET['keterangan'];
$status = $_GET['status'];

// Generate nama file sesuai dengan data yang diberikan
$filename = $kode . "_" . $username . "_" . $tgl . "_" . $kue . ".txt";

// Mengatur header untuk file download
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/octet-stream");

// Membuat konten file download
$content = "Kode: " . $kode . "\n";
$content .= "Username Member: " . $username . "\n";
$content .= "Tanggal: " . $tgl . "\n";
$content .= "Kue: " . $kue . "\n";
$content .= "Jumlah: " . $jumlah . "\n";
$content .= "Total Bayar: " . $total_bayar . "\n";
$content .= "Keterangan: " . $keterangan . "\n";
$content .= "Status dibayar: " . $status . "\n";

// Menulis konten file download
echo $content;
exit;
