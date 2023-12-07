<?php
include "config/config.php";

// Cek apakah tombol "Update" ditekan
if(isset($_POST['multi_update'])) {
    // Mendapatkan nilai status yang dipilih
    $status = $_POST['status'];
    
    // Mendapatkan array produk yang dipilih
    $produk = $_POST['produk'];

    // Looping untuk melakukan update pada setiap produk yang dipilih
    foreach($produk as $id) {
        // Query update status produk
        $query = "UPDATE produk SET status = '$status' WHERE id_kue = '$id'";
        $update = $conn->query($query);
    }

    // Redirect kembali ke halaman data_produk.php dengan parameter editdata
    header("Location: home.php?page=data_produk&editdata");
    exit();
}

// Cek apakah tombol "Delete" ditekan
if(isset($_GET['delete'])) {
    // Mendapatkan ID produk yang akan dihapus
    $id = $_GET['delete'];

    // Query delete produk
    $query = "DELETE FROM produk WHERE id_kue = '$id'";
    $delete = $conn->query($query);

    // Redirect kembali ke halaman data_produk.php dengan parameter remove
    header("Location: home.php?page=data_produk&remove");
    exit();
}
