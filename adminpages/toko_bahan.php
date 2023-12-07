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
                    <h1 class="mt-4">Data Toko</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="container">

                        <a href="home.php?page=data_bank" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
                            <i class="fa fa-refresh"></i> Refresh Data</a>
                        <div class="clearfix"></div>
                        <br />

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form
                            </div>
                            <div class="card-body">
                                <form method="POST" action="aksi_toko.php">
                                    <?php include 'aksi_toko.php'; ?>
                                    <?php
                                    if ($update == true) :
                                    ?>

                                        <input type="hidden" name="id" id="exampleInputid" value="<?php echo $id; ?>">

                                    <?php else : ?>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Id</label>
                                            <input type="text" name="id" class="form-control" id="exampleInputid" aria-describedby="id">
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Nama toko</label>
                                        <input type="text" name="nama_toko" class="form-control" id="exampleInputnama_bank" value="<?php echo $name; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" id="exampleInputnama_lengkap" value="<?php echo $nama_lengkap; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="exampleInputalamat" value="<?php echo $alamat; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Telepon</label>
                                        <input type="text" name="telepon" class="form-control" id="exampleInputtelepon" value="<?php echo $telepon; ?>">
                                    </div>
                                    <?php
                                    if ($update == true) :
                                    ?>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    <?php else : ?>
                                        <button type="submit" name="insert" class="btn btn-primary" onclick="javascript:return confirm('Anda yakin insert data bank?');">Submit</button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabel Data Supplier
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Toko</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Toko</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include "aksi_toko.php";
                                        include "config/config.php";

                                        $query = "SELECT * FROM supplier";

                                        $tampil = $conn->query($query);
                                        while ($c = $tampil->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $c['id']; ?></td>
                                                <td><?php echo $c['nama_toko']; ?></td>
                                                <td><?php echo $c['nama_lengkap']; ?></td>
                                                <td><?php echo $c['alamat']; ?></td>
                                                <td><?php echo $c['telepon']; ?></td>
                                                <td>
                                                    <a href="home.php?page=toko_bahan&&edit=<?php echo $c['id']; ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit</button>
                                                    </a>

                                                    <a href="aksi_toko.php?delete=<?php echo $c['id']; ?>">
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin hapus data bank?');">Delete</button>
                                                    </a>
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