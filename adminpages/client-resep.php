<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Client
{
    private $url_resep;

    public function __construct($url_resep)
    {
        $this->url_resep = $url_resep;
        unset($url_resep);
    }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function generate_kodeResep()
    {
        $client = curl_init($this->url_resep . "?aksi=generate");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($data, $client, $response);
    }

    public function tampil_semua_data_resep()
    {
        $client = curl_init($this->url_resep);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($data, $client, $response);
    }

    public function tampil_semua_data_produk()
    {
        $client = curl_init($this->url_resep . "?aksi=produk");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($data, $client, $response);
    }

    public function tampil_data_resep($id)
    {
        $id = $this->filter($id);
        $client = curl_init($this->url_resep . "?aksi=tampil&id=" . $id);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id, $client, $response, $data);
    }


    public function tambah_data_resep($data)
    {
        $data = '{
            "id" : "' . $data['id'] . '",
            "id_kue" : "' . $data['id_kue'] . '",
            "bahan" : "' . $data['bahan'] . '",
            "cara_buat" : "' . $data['cara_buat'] . '",
            "gambar" : "' . $data['gambar'] . '",
            "aksi" : "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url_resep);
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

    public function ubah_data_resep($data)
    {
        $data = '{
            "id" : "' . $data['id'] . '",
            "bahan" : "' . $data['bahan'] . '",
            "cara_buat" : "' . $data['cara_buat'] . '",
            "aksi" : "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url_resep);
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

    public function hapus_data_resep($data)
    {
        $id = $this->filter($data['id']);
        $data = '{
            "id" : "' . $id . '",
            "aksi" : "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url_resep);
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
        unset($this->url_resep);
    }
}

$url_resep = '192.168.18.13/bakery/server/server-resep.php';
$resep = new Client($url_resep);
