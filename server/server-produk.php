<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "Database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCES_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTION");
    if (isset($_SERVER['HTTP_ACCES_CONTROL_REQUEST_HEADER']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");


function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id = $data->id;
    $id_kue = $data->id_kue;
    $bahan = $data->bahan;
    $cara_buat = $data->cara_buat;
    $gambar = $data->gambar;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id' => $id,
            'id_kue' => $id_kue,
            'bahan' => $bahan,
            'cara_buat' => $cara_buat,
            'gambar' => $gambar
        );
        // $abc->tambah_data_produk($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id' => $id,
            'bahan' => $bahan,
            'cara_buat' => $cara_buat
        );
        // $abc->ubah_data_produk($data2);
    } elseif ($aksi == 'hapus') {
        // $abc->hapus_data_produk($id);
    }
    unset($postdata, $data, $data2, $id, $nama_bank, $alamat, $telepon, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id']))) {
        $id = filter($_GET['id']);
        // $data = $abc->tampil_data_produk($id);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_data_produk();
        echo json_encode($data);
    }
    unset($postdata, $id, $data, $abc);
}
