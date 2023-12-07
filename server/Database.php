<?php
error_reporting(1); //error ditampilkan

class Database
{
    private $host = "localhost";
    private $dbname = "kue";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $conn;

    //function yang pertama kali di-load saat class dipanggil
    public function __construct()
    { //koneksi database
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Koneksi Gagal";
        }
    }

    // BANK
    public function tampil_data_bank($id)
    {
        $query = $this->conn->prepare("SELECT * FROM bank WHERE id=?");
        $query->execute(array($id));
        //mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        //hapus variable dari memory
        $query->closeCursor();
        unset($id, $data);
    }

    public function tampil_semua_data_bank()
    {
        $query = $this->conn->prepare("SELECT * FROM bank");
        $query->execute();
        //mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tambah_data_bank($data)
    {
        $query = $this->conn->prepare("insert ignore into bank (id,nama_bank,alamat,telepon) values (?,?,?,?)");
        $query->execute(array($data['id'], $data['nama_bank'], $data['alamat'], $data['telepon']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data_bank($data)
    {
        $query = $this->conn->prepare("UPDATE bank SET nama_bank=?, alamat=?, telepon=? WHERE id=?");
        $query->execute(array($data['nama_bank'], $data['alamat'], $data['telepon'], $data['id']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data_bank($id)
    {
        $query = $this->conn->prepare("DELETE FROM bank WHERE id=?");
        $query->execute(array($id));
        $query->closeCursor();
        unset($id);
    }

    // RESEP
    public function generate_kodeResep()
    {
        $query = $this->conn->prepare("SELECT max(id) as maxKode FROM resep");
        $query->execute();
        //mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tampil_semua_data_resep()
    {
        $query = $this->conn->prepare("SELECT * FROM resep JOIN produk ON resep.id_kue = produk.id_kue");
        $query->execute();
        //mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tambah_data_resep($data)
    {
        $query = $this->conn->prepare("INSERT INTO resep (id, id_kue, bahan, cara_buat, gambar_resep) VALUES (?,?,?,?,?)");
        $query->execute(array($data['id'], intval($data['id_kue']), $data['bahan'], $data['cara_buat'], $data['gambar']));
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data_resep($id)
    {
        $query = $this->conn->prepare("SELECT * FROM resep JOIN produk ON resep.id_kue = produk.id_kue WHERE id = ?");
        $query->execute(array($id));
        //mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        //hapus variable dari memory
        $query->closeCursor();
        unset($id, $data);
    }

    public function ubah_data_resep($data)
    {
        $query = $this->conn->prepare("UPDATE resep SET bahan = ?, cara_buat = ? WHERE id = ?");
        $query->execute(array($data['bahan'], $data['cara_buat'], $data['id']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data_resep($id)
    {
        $query = $this->conn->prepare("DELETE FROM resep WHERE id = ?");
        $query->execute(array($id));
        $query->closeCursor();
        unset($id);
    }

    //PRODUK
    public function tampil_semua_data_produk()
    {
        $query = $this->conn->prepare("SELECT * FROM produk");
        $query->execute();
        //mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        $query->closeCursor();
        unset($data);
    }

    //PESANAN
    public function tampil_semua_data_pesanan()
    {
        $query = $this->conn->prepare("SELECT * FROM pesanan JOIN produk ON pesanan.id_kue = produk.id_kue");
        $query->execute();
        //mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        $query->closeCursor();
        unset($data);
    }

    //PEMBAYARAN
    public function tampil_semua_data_pembayaran()
    {
        $query = $this->conn->prepare("SELECT * FROM pembayaran");
        $query->execute();
        //mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //mengembalikan data
        return $data;
        $query->closeCursor();
        unset($data);
    }
}
