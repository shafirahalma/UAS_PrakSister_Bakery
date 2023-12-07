<?php
// Ambil id produk dari parameter URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Query database untuk mendapatkan data produk yang akan diedit
    include "config/config.php";
    $query = "SELECT * FROM produk WHERE id_kue = $id_produk";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    // Cek apakah produk ditemukan
    if ($result->num_rows > 0) {
        $kategori = $row['kategori'];
        $nama = $row['nama'];
        $deskripsi = $row['keterangan'];
        $gambar = $row['gambar'];
        $harga = $row['harga'];
       
    } else {
        // Jika produk tidak ditemukan, redirect ke halaman data_produk.php atau halaman lain yang sesuai
        header("Location: data_produk.php");
        exit();
    }
} else {
    // Jika id produk tidak diberikan, redirect ke halaman data_produk.php atau halaman lain yang sesuai
    header("Location: data_produk.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        img {
            width: 120px;
            height: 100px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Edit Produk</h1>

    <form method="POST" action="aksi_edit_produk.php" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
        <div>
            <label for="kategori">Kategori:</label>
            <input type="text" name="kategori" value="<?php echo $kategori; ?>">
        </div>
        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $nama; ?>">
        </div>
        <div>
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" name="deskripsi" value="<?php echo $deskripsi; ?>">
        </div>
        <div>
            <label for="gambar">Gambar:</label>
            <img src="gambar_kue/<?php echo $gambar; ?>" style="width: 120px; height: 100px;">
            <input type="file" name="gambar">
        </div>
        <div>
            <label for="harga">Harga:</label>
            <input type="text" name="harga" value="<?php echo $harga; ?>">
        </div>
        
        <button type="submit" name="submit">Simpan</button>
    </form>

    <!-- Tambahkan bagian footer atau script lainnya yang dibutuhkan -->

</body>

</html>