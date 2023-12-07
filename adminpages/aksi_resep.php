<?php
// include "config/config.php";
include "client-resep.php";

$update = false;
$id = '';
$nama_kue = '';
$cara_buat = '';
$bahan = '';
$kodeResep = '';
$gambar = '';
$produk = [];

// Insert
if (isset($_POST['insert'])) {
	$id = $_POST['id_resep'];
	$id_kue = $_POST['id_kue'];
	$bahan = $_POST['bahan'];
	$cara_buat = $_POST['cara_buat'];
	$gambar = $_FILES['gambar']['name'];

	if ($gambar != "") {
		$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['gambar']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $angka_acak . '-' . $gambar;
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'gambar_resep/' . $nama_gambar_baru);
			$data = array(
				"id" => $id,
				"id_kue" => $id_kue,
				"bahan" => $bahan,
				"cara_buat" => $cara_buat,
				"gambar" => $nama_gambar_baru,
				"aksi" => $_POST['aksi']
			);

			// var_dump($data);
			$insert = $resep->tambah_data_resep($data);
			if (!$insert) {
				die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
			} else {
				echo "<script>alert('Data berhasil ditambah.');window.location='home.php?page=data_resep&&insert=data-insert';</script>";
			}
		} else {
			echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, png, dan jpeg.');window.location='home.php?page=data_produk';</script>";
		}
	} else {
		echo "Error";
	}
}

// Delete
if (isset($_GET['delete'])) {
	$data = array("id" => $_GET['delete'], "aksi" => 'hapus');
	$delete = $resep->hapus_data_resep($data);
	if ($delete) {
		echo "<script>alert('Berhasil menghapus data.');window.location='home.php?page=data_resep&&remove=hapus-data';</script>";
	} else {
		echo "<script>alert('ERROR');</script>" . mysqli_error($conn);
	}
}

// Kode Resep
if (!isset($_GET['edit'])) {
	$data = $resep->generate_kodeResep();
	foreach ($data as $dataResep) {
		$kodeResep = $dataResep->maxKode;
		$noUrut = (int) substr($kodeResep, 3, 3);

		$noUrut++;


		$char = "RSP";
		$kodeResep = $char . sprintf("%03s", $noUrut);
	}

	$produk = $resep->tampil_semua_data_produk();
}

// Edit
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;

	$data = $resep->tampil_data_resep($id);

	$id = $data->id;
	$nama_kue = $data->nama;
	$cara_buat = $data->cara_buat;
	$bahan = $data->bahan;
	$gambar = $data->gambar;
}

// Update
if (isset($_POST['update'])) {
	$data = array(
		"id" => $_POST['id_resep'],
		"bahan" => $_POST['bahan'],
		"cara_buat" => $_POST['cara_buat'],
		"aksi" => $_POST['aksi']
	);
	// var_dump($data);
	$update = $resep->ubah_data_resep($data);
	if ($update) {
		echo "<script>alert('Data berhasil diubah.');window.location='home.php?page=data_resep&&editdata=edit-data';</script>";
	} else {
		echo "<script>alert('Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn) . "');</script>";
	}
}
