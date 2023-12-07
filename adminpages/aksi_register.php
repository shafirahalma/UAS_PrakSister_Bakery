<?php
include "config/config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$cekpassword = md5($_POST['cekpassword']);
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$telepon = $_POST['telepon'];
$jk = $_POST['jk'];
$role = $_POST['role'];

if ($password == $cekpassword) {
	$query = "INSERT INTO member (nama_lengkap, username, password, tgl_lahir, alamat, asal_kota, telepon, jk, level)
	VALUES ('" . $nama . "', '" . $username . "', '" . $password . "', '" . $tgl_lahir . "', '" . $alamat . "', '" . $kota . "', '" . $telepon . "', '" . $jk . "' , '" . $role . "')
	";

	$insert = $conn->query($query);

	if ($insert === true) {
		echo "<script>
		alert('Registrasi Berhasil');
		window.location.href = ('home.php');
		</script>
		";
	} else {
		echo "<script>
		alert('Gagal, silakan coba lagi');
		</script>
		" . mysqli_error($conn);
	}
}
