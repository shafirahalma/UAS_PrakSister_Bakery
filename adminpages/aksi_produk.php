<?php

include "config/config.php";

// $update = false;
// $id = '';
// $kategori = '';
// $name = '';
// $harga = '';
// $gambar = '';
// $deskripsi = '';
// $status = '';

//insert
if (isset($_POST['insert'])) {
	$kategori = $_POST['kategori'];
	$nama_kue = $_POST['nama_kue'];
	$deskripsi = $_POST['deskripsi'];
	$gambar = $_FILES['gambar_kue'];
	$harga = $_POST['harga_kue'];
	$status = $_POST['status_kue'];
	$jml = $_POST['jum'];

	for ($i = 0; $i < $jml; $i++) {
		$nama_gambar = $gambar['name'][$i];
		$file_tmp = $gambar['tmp_name'][$i];
		$ekstensi_diperbolehkan = ['jpg', 'jpeg', 'png'];
		$x = explode('.', $nama_gambar);
		$ekstensi = strtolower(end($x));
		// $angka_acak     = rand(1, 999);
		// $nama_gambar_baru = $angka_acak . '-' . $nama_gambar;
		if (!in_array($ekstensi, $ekstensi_diperbolehkan)) {
			echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, png, dan jpeg.');</script>";
			return false;
		}
		move_uploaded_file($file_tmp, 'gambar_kue/' . $nama_gambar);
		$query = "INSERT INTO produk (kategori, nama, keterangan, gambar, harga, status) VALUES 
		('$kategori[$i]', '$nama_kue[$i]', '$deskripsi[$i]', '$nama_gambar', '$harga[$i]', '$status[$i]')";

		$result = mysqli_query($conn, $query);

		if (!$result) {
			die("Query gagal dijalankan: " . mysqli_errno($conn) .
				" - " . mysqli_error($conn));
		} else {
			//tampil alert dan akan redirect ke halaman index.php
			//silahkan ganti index.php sesuai halaman yang akan dituju
			echo "<script>alert('Data berhasil ditambah.');window.location='home.php?page=data_produk&&insert=data-insert';</script>";
		}
	}
}
//delete
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$query = "DELETE FROM produk WHERE id_kue=$id";
	$delete = $conn->query($query);

	if ($delete == true) {
		echo "
		<script>
		alert('Berhasil mengahapus data');
		</script>
		";

		echo '<script>window.location="home.php?page=data_produk&&remove=hapus-data"</script>';
	} else {
		echo "
		<script>
		alert('ERORR');
		</script>
		" . mysqli_error($conn);
	}
}

//edit
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM produk WHERE id_kue=?";
	$edit = $conn->prepare($query);
	$edit->bind_param("i", $id);
	$edit->execute();
	$result = $edit->get_result();
	$row = $result->fetch_assoc();

	$id = $row['id_kue'];
	$kategori = $row['kategori'];
	$name = $row['nama'];
	$harga = $row['harga'];
	$gambar = $row['gambar'];
	$deskripsi = $row['keterangan'];
	$status = $row['status'];
}

// update
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$kategori = $_POST['kategori'];
	$name = $_POST['nama_kue'];
	$harga = $_POST['harga_kue'];
	$gambar = $_FILES['gambar_kue']['name'];
	$deskripsi = $_POST['deskripsi'];
	$status = $_POST['status_kue'];

	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($gambar != "") {
		$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
		$x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['gambar_kue']['tmp_name'];
		$angka_acak     = rand(1, 999);
		$nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'gambar_kue/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
			move_uploaded_file($file_tmp, 'gambar_resep/' . $nama_gambar_baru); //jika input gambar kue maka input juga di gambar resep

			// jalankan query UPDATE berdasarkan ID yang produknya kita edit
			$query  = "UPDATE produk SET kategori = '$kategori', nama='$name', keterangan = '$deskripsi', harga = '$harga', gambar = '$nama_gambar_baru', status = '$status'";
			$query .= "WHERE id_kue = '$id'";
			$result = mysqli_query($conn, $query);
			// periska query apakah ada error
			if (!$result) {
				die("Query gagal dijalankan: " . mysqli_errno($conn) .
					" - " . mysqli_error($conn));
			} else {
				//tampil alert dan akan redirect ke halaman index.php
				//silahkan ganti index.php sesuai halaman yang akan dituju
				echo "<script>alert('Data berhasil diubah.');window.location='home.php?page=data_produk&&editdata=edit-data';</script>";
			}
		} else {
			//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
			echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
		}
	} else {
		$query  = "UPDATE produk SET kategori = '$kategori', nama='$name', keterangan = '$deskripsi', harga = '$harga', status = '$status'";
		$query .= "WHERE id_kue = '$id'";
		$result = mysqli_query($conn, $query);
		// periska query apakah ada error
		if (!$result) {
			die("Query gagal dijalankan: " . mysqli_errno($conn) .
				" - " . mysqli_error($conn));
		} else {
			//tampil alert dan akan redirect ke halaman index.php
			//silahkan ganti index.php sesuai halaman yang akan dituju
			echo "<script>alert('Data berhasil diubah.');window.location='home.php?page=data_produk&&editdata=edit-data';</script>";
		}
	}
}
