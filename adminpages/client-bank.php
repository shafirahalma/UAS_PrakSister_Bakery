<?php
error_reporting(1);
class Client
{
    private $url_bank;

    public function __construct($url_bank)
    {
        $this->url_bank = $url_bank;
        unset($url_bank);
    }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function tampil_semua_data_bank()
    {
        $client = curl_init($this->url_bank);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($data, $client, $response);
    }

    public function tampil_data_bank($id)
    {
        $id = $this->filter($id);
        $client = curl_init($this->url_bank . "?aksi=tampil&id=" . $id);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id, $client, $response, $data);
    }

    public function tambah_data_bank($data)
    {
        $data = '{
            "id" : "' . $data['id'] . '",
            "nama_bank" : "' . $data['nama_bank'] . '",
            "alamat" : "' . $data['alamat'] . '",
            "telepon" : "' . $data['telepon'] . '",
            "aksi" : "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url_bank);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        $httpCode = curl_getinfo($c, CURLINFO_HTTP_CODE);
        curl_close($c);

        if ($httpCode == 200) {
            return true;
        } else {
            return false;
        }

        unset($data, $c, $response);
    }

    public function ubah_data_bank($data)
    {
        $data = '{
            "id" : "' . $data['id'] . '",
            "nama_bank" : "' . $data['nama_bank'] . '",
            "alamat" : "' . $data['alamat'] . '",
            "telepon" : "' . $data['telepon'] . '",
            "aksi" : "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url_bank);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        $httpCode = curl_getinfo($c, CURLINFO_HTTP_CODE);

        curl_close($c);

        if ($httpCode == 200) {
            return true;
        } else {
            return false;
        }

        unset($data, $c, $response);
    }

    public function hapus_data_bank($data)
    {
        $id = $this->filter($data['id']);
        $data = '{
            "id" : "' . $id . '",
            "aksi" : "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url_bank);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        $httpCode = curl_getinfo($c, CURLINFO_HTTP_CODE);

        curl_close($c);

        if ($httpCode == 200) {
            return true;
        } else {
            return false;
        }
        unset($data, $c, $response);
    }


    public function __destruct()
    {
        unset($this->url_bank);
    }
}

$url_bank = '192.168.18.13/bakery/server/server-bank.php';
$bank = new Client($url_bank);
