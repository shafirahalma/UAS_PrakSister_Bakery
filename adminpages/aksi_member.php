<?php

include "config/config.php";

if (isset($_POST['deleteButton'])) {
  if (isset($_POST['delete'])) {
    $deleteIds = $_POST['delete'];

    // Menghapus data berdasarkan username yang dipilih
    $deleteQuery = "DELETE FROM member WHERE username IN ('" . implode("','", $deleteIds) . "')";
    $deleteResult = $conn->query($deleteQuery);

    if ($deleteResult) {
      echo "Data berhasil dihapus.";
    } else {
      echo "Gagal menghapus data." . mysqli_error($conn);
    }
  } else {
    echo "Tidak ada data yang dipilih.";
  }
}
