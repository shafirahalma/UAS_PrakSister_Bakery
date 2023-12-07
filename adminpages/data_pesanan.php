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
                    <h1 class="mt-4">Data Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="container">

                        <a href="home.php?page=data_pesanan" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
                            <i class="fa fa-refresh"></i> Refresh Data</a>
                        <div class="clearfix"></div>
                        <br />

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form
                            </div>
                            <div class="card-body">
                                <form method="POST" action="aksi_pesanan.php">
                                    <?php include 'aksi_pesanan.php'; ?>
                                    <?php
                                    if ($update == true) :
                                    ?>

                                        <input type="hidden" name="kode" id="exampleInputid" value="<?php echo $id; ?>">
                                        <!-- <input type="hidden" name="username" id="exampleInputid" value="<?php echo $username; ?>"> -->
                                        <input type="hidden" name="tgl" id="exampleInputid" value="<?php echo $tgl; ?>">
                                        <input type="hidden" name="id_kue" id="exampleInputid" value="<?php echo $id_kue; ?>">
                                        <input type="hidden" name="jumlah" id="exampleInputid" value="<?php echo $jumlah; ?>">
                                        <input type="hidden" name="total_bayar" id="exampleInputid" value="<?php echo $total_bayar; ?>">
                                        <input type="hidden" name="deskripsi" id="exampleInputid" value="<?php echo $deskripsi; ?>">
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Status</label>
                                        <select name="status" class="form-control" id="exampleInputstatus" value="<?php echo $status; ?>">
                                            <!-- <option value="belum_dibayar" selected><?php echo $status; ?></option> -->
                                            <option value="sudah_dibayar">sudah_dibayar</option>
                                            <option value="belum_dibayar">belum_dibayar</option>
                                        </select>
                                    </div>

                                    <?php
                                    if ($update == true) :
                                    ?>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    <?php else : ?>
                                        <!-- <button type="submit" name="insert" class="btn btn-primary" 
                                         onclick="javascript:return confirm('Anda yakin insert data bank?');">Submit</button> -->
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabel Data Pesanan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <!-- <th>Username Member</th> -->
                                            <th>Tanggal</th>
                                            <th>Kue</th>
                                            <th>Jumlah</th>
                                            <th>Total Bayar</th>
                                            <th>deskripsi</th>
                                            <!-- <th>Status</th> -->
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode</th>
                                            <!-- <th>Username Member</th> -->
                                            <th>Tanggal</th>
                                            <th>Kue</th>
                                            <th>Jumlah</th>
                                            <th>Total Bayar</th>
                                            <th>deskripsi</th>
                                            <!-- <th>Status</th> -->
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include "client-pesanan.php";

                                        $dataPesanan = $pesanan->tampil_semua_data_pesanan();
                                        foreach ($dataPesanan as $data) { ?>
                                            <tr>
                                                <td><?php echo $data->kode; ?></td>
                                                <!-- <td><?php echo $data->username; ?></td> -->
                                                <td><?php echo $data->tgl; ?></td>
                                                <td><?php echo $data->nama; ?></td>
                                                <td><?php echo $data->jumlah; ?></td>
                                                <td><?php echo $data->total_bayar; ?></td>
                                                <td><?php echo $data->deskripsi; ?></td>
                                                <!-- <td><?php echo $data->status_pesanan; ?></td> -->
                                                <td>

                                                    <!-- Tombol Edit -->
                                                    <a href="home.php?page=data_pesanan&&edit=<?php echo $data->kode; ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit</button>
                                                    </a>

                                                    <!-- Tombol Delete -->
                                                    <a href="aksi_pesanan.php?delete=<?php echo $data->kode; ?>">
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin hapus data bank?');">Delete</button>
                                                    </a>

                                                    <!-- Tombol download -->
                                                    <!-- <a href="download_pesanan.php?kode=<?php echo $data->kode; ?>&username=<?php echo $data->username; ?>&tgl=<?php echo $data->tgl; ?>&kue=<?php echo $data->nama; ?>&jumlah=<?php echo $data->jumlah; ?>&total_bayar=<?php echo $data->total_bayar; ?>&deskripsi=<?php echo $data->deskripsi; ?>" class="btn btn-success btn-sm">
                                                        <i class="fas fa-download"></i> Download
                                                    </a> -->

                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </main>
            <!--End Table-->
        </div>
    </section>
</section>