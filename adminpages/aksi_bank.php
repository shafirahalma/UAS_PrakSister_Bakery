<?php

include "client-bank.php";

$update = false;
$id = '';
$name = '';
$alamat = '';
$telepon = '';

//insert
if (isset($_POST['insert'])) {
	$data = array(
		"id" => $_POST['id'],
		"nama_bank" => $_POST['nama_bank'],
		"alamat" => $_POST['alamat'],
		"telepon" => $_POST['telepon'],
		"aksi" => $_POST['aksi']
	);
	// var_dump($data);
	$insert = $bank->tambah_data_bank($data);
	if ($insert) {
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

//delete
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$data = array("id" => $_GET['delete'], "aksi" => 'hapus');
	$delete = $bank->hapus_data_bank($data);

	if ($delete == true) {
		echo "
	<script>
	alert('Berhasil mengahapus data');
	</script>
	";

		echo '<script>window.location="home.php?page=data_bank&&remove=hapus-data"</script>';
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

	$data = $bank->tampil_data_bank($id);

	$id = $data->id;
	$name = $data->nama_bank;
	$alamat = $data->alamat;
	$telepon = $data->telepon;
}

// update
if (isset($_POST['update'])) {
	$data = array(
		"id" => $_POST['id'],
		"nama_bank" => $_POST['nama_bank'],
		"alamat" => $_POST['alamat'],
		"telepon" => $_POST['telepon'],
		"aksi" => $_POST['aksi']
	);
	$update = $bank->ubah_data_bank($data);
	if ($update == true) {
		header('location:home.php?page=data_bank&&editdata=edit-data');
	} else {
		echo "<script>alert('Error'.'mysqli_error($conn)');</script>";
	}
}
unset($bank, $data);
