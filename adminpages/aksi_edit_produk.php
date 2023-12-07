<?php
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id_produk = $_POST['id_produk'];
    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    

    // Periksa apakah ada file gambar yang diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];

        // Pindahkan file gambar yang diupload ke direktori tujuan
        move_uploaded_file($gambar_tmp, "gambar_kue/" . $gambar);
    } else {
        // Jika tidak ada file gambar yang diupload, gunakan gambar yang sudah ada sebelumnya
        $gambar = $_POST['gambar_lama'];
    }


    // Proses update data produk ke database
    include "config/config.php";
    $query = "UPDATE produk SET kategori='$kategori', nama='$nama', keterangan='$deskripsi', gambar='$gambar', harga='$harga'  WHERE id_kue='$id_produk'";
    $result = $conn->query($query);

    if ($result) {
        // Jika update berhasil, redirect ke halaman data_produk.php atau halaman lain yang sesuai
        header("Location: home.php?page=data_produk");
        exit();
    } else {
        // Jika update gagal, tampilkan pesan error atau lakukan penanganan error yang sesuai
        echo "Error: " . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else if (isset($_POST['multi_update'])) {
    include "config/config.php";
    // Mendapatkan nilai status yang dipilih
    $status = $_POST['status'];

    // Mendapatkan array produk yang dipilih
    $produk = $_POST['produk'];

    // Looping untuk melakukan update pada setiap produk yang dipilih
   
    // Redirect kembali ke halaman data_produk.php dengan parameter editdata
    header("Location: home.php?page=data_produk&editdata");
    exit();
} else {
    // Jika form tidak di-submit, redirect ke halaman data_produk.php atau halaman lain yang sesuai
    header("Location: data_produk.php");
    exit();
}
