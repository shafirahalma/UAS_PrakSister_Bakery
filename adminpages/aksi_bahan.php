<?php

include "config/config.php";

$update = false;
$id='';
$name='';

//insert
if (isset($_POST['insert'])) {
    $id=$_POST['id'];
	$nama_bank= $_POST['nama_bank'];

	$query = "INSERT INTO bank (id,nama_bank) VALUES ('".$id."','".$nama_bank."')";
	$insert = $conn->query($query);

	if($insert == true){
        echo "
		<script>
		alert('Berhasil insert data');
		</script>
		";

        echo '<script>window.location="home.php?page=data_bank&&insert=insert-data"</script>';
	}else {
	echo "
		<script>
		alert('ERORR');
		</script>
		";	
	}
}

//delete
if (isset($_GET['delete'])) {
	$id= $_GET['delete'];

	$query = "DELETE FROM bank WHERE id=$id";
	$delete = $conn->query($query);

	if($delete == true){
    echo "
		<script>
		alert('Berhasil mengahapus data');
		</script>
		";

        echo '<script>window.location="home.php?page=data_bank&&remove=hapus-data"</script>';
	}else {
	echo "
		<script>
		alert('ERORR');
		</script>
		".mysqli_error($conn);	
	}
}

//edit
if (isset($_GET['edit'])) {
	$id= $_GET['edit'];
	$update=true;

	$query = "SELECT * FROM bank WHERE id=?";
	$edit = $conn->prepare($query);
	$edit -> bind_param("i",$id);
	$edit->execute();
	$result=$edit->get_result();
	$row=$result->fetch_assoc();

	$id=$row['id'];
	$name=$row['nama_bank'];
}
 
// update
if (isset($_POST['update'])) {
	$id=$_POST['id'];
	$nama_bank=$_POST['nama_bank'];

	$query="UPDATE bank SET nama_bank='$nama_bank' WHERE id='$id'";
	$stmt=$conn->query($query);

	echo $id;
	echo $nama_bank;
	
	if ($stmt == true) {
		header('location:home.php?page=data_bank&&editdata=edit-data');
	}else{
		echo "<script>alert('Error'.'mysqli_error($conn)');</script>";
	}
	
}
?>