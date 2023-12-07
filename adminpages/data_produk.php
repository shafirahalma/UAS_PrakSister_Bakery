<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <main>
                <?php if (isset($_GET['remove'])) { ?>
                    <div class="alert alert-danger">
                        <p>Hapus Data Berhasil !</p>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['insert'])) { ?>
                    <div class="alert alert-success">
                        <p>Insert Data Berhasil !</p>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['editdata'])) { ?>
                    <div class="alert alert-primary">
                        <p>Edit Data Berhasil !</p>
                    </div>
                <?php } ?>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Produk</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="container">

                        <a href="home.php?page=data_produk" style="margin-right: 0.5pc;" class="btn btn-success btn-md pull-right">
                            <i class="fa fa-refresh"></i> Refresh Data</a>
                        <div class="clearfix"></div>
                        <br />

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Data Produk
                            </div>
                            <div class="card-body">
                                <form method="POST" action="home.php?page=tambah_produk" enctype="multipart/form-data">
                                    Jumlah Data
                                    <input type="text" name="jum" size="1">
                                    <input type="submit" name="submit" value="Proses" class="btn btn-primary">
                                </form>

                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabel Data Produk
                            </div>
                            <div class="card-body">
                                <form method="POST" action="aksi_edit_produk.php">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>Id</th>
                                                <th>Kategori</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Gambar</th>
                                                <th>Harga</th>
                                                <!-- <th>Status</th> -->
                                                <th>Kelola</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Id</th>
                                                <th>Kategori</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Gambar</th>
                                                <th>Harga</th>
                                                <!-- <th>Status</th> -->
                                                <th>Kelola</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            // include "aksi_produk.php";
                                            // include "config/config.php";

                                            // $query = "SELECT * FROM produk ";
                                            // $tampil = $conn->query($query);
                                            include "client-produk.php";

                                            $dataProduk = $produk->tampil_semua_data_produk();

                                            foreach ($dataProduk as $data) {
                                            ?>
                                                <tr>
                                                    <td><input type="checkbox" name="produk[]" value="<?php echo $data->id_kue; ?>"></td>
                                                    <td><?php echo $data->id_kue; ?></td>
                                                    <td><?php echo $data->kategori; ?></td>
                                                    <td><?php echo $data->nama; ?></td>
                                                    <td><?php echo $data->keterangan; ?></td>
                                                    <td style="text-align: center;"><img src="gambar_kue/<?php echo $data->gambar; ?>" style="width: 120px; height: 100px"></td>
                                                    <td><?php echo $data->harga; ?></td>

                                                    <td>
                                                        <a href="edit_produk.php?id=<?php echo $data->id_kue; ?>">
                                                            <button type="button" class="btn btn-primary btn-sm" name="edit">Edit</button>
                                                        </a>
                                                        <a href="aksi_produk.php?delete=<?php echo $data->id_kue; ?>">
                                                            <button type="button" name="delete" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin hapus data bank?');">Delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                    <!-- <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="ada">Ada</option>
                                            <option value="kosong">Kosong</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <button type="submit" name="multi_update" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--End Table-->
        </div>
    </section>
</section>