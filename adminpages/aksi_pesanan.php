<?php

include "config/config.php";

$update = false;
$kode = '';
$username = '';
$tgl = '';
$id_kue = '';
$jumlah = '';
$total_bayar = '';
$deskripsi = '';
// $status = '';

//tambah
if (isset($_POST['insert'])) {
	$id = $_POST['id'];
	$nama_bank = $_POST['nama_bank'];

	$query = "INSERT INTO bank (id,nama_bank) VALUES ('" . $id . "','" . $nama_bank . "')";
	$insert = $conn->query($query);

	if ($insert == true) {
		echo "
		<script>
		alert('Berhasil insert data');
		</script>
		";

		echo '<script>window.location="home.php?page=data_bank&&insert=insert-data"</script>';
	} else {
		echo "
		<script>
		alert('ERORR');
		</script>
		";
	}
}

// hapus pesanan 
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	// Hapus data dari tabel pembayaran terlebih dahulu
	$query_pembayaran = "DELETE FROM pembayaran WHERE kode_order='$id'";
	$delete_pembayaran = $conn->query($query_pembayaran);

	if ($delete_pembayaran) {
		// Jika penghapusan data pembayaran berhasil, lanjutkan menghapus data pesanan
		$query_pesanan = "DELETE FROM pesanan WHERE kode='$id'";
		$delete_pesanan = $conn->query($query_pesanan);

		if ($delete_pesanan) {
			echo "
			<script>
			alert('Berhasil menghapus data');
			</script>
			";

			echo '<script>window.location="home.php?page=data_pesanan&&remove=hapus-data"</script>';
		} else {
			echo "
			<script>
			alert('ERORR saat menghapus data pesanan');
			</script>
			" . mysqli_error($conn);
		}
	} else {
		echo "
		<script>
		alert('ERORR saat menghapus data pembayaran');
		</script>
		" . mysqli_error($conn);
	}
}


//edit
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM pesanan WHERE kode=?";
	$edit = $conn->prepare($query);
	$edit->bind_param("i", $id);
	$edit->execute();
	$result = $edit->get_result();
	$row = $result->fetch_assoc();

	$kode = $row['kode'];
	// $username = $row['username'];
	$tgl = $row['tgl'];
	$id_kue = $row['id_kue'];
	$jumlah = $row['jumlah'];
	$total_bayar = $row['total_bayar'];
	$deskripsi = $row['deskripsi'];
	

// update
if (isset($_POST['update'])) {
	$kode = $_POST['kode'];
	// $username = $_POST['username'];
	// $status = $_POST['status'];

	$query = "UPDATE pesanan SET status_pesanan='$status' WHERE kode='$kode'";
	$stmt = $conn->query($query);


	if ($stmt == true) {
		echo "<script>alert('Berhasil');</script>";
		header('location:home.php?page=data_pesanan&&editdata=edit-data');
	} else {
		echo "<script>alert('Error');</script>";
		echo mysqli_error($conn);
	}
}
}