<!-- <section id="main-content">
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
                    <h1 class="mt-4">Data Bank</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Bank</li>
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
                                <form method="POST" action="aksi_bank.php">
                                    <?php include 'aksi_bank.php'; ?>
                                    <?php
                                    if ($update == true) :
                                    ?>

                                        <input type="hidden" name="id" id="exampleInputid" value="<?php echo $id; ?>">

                                    <?php else : ?>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Id bank</label>
                                            <input type="text" name="id" class="form-control" id="exampleInputid" aria-describedby="id">
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Nama Bank</label>
                                        <input type="text" name="nama_bank" class="form-control" id="exampleInputnama_bank" value="<?php echo $name; ?>">
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
                                Tabel Data Bank
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Bank</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Bank</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include "aksi_bank.php";
                                        include "config/config.php";

                                        $query = "SELECT * FROM bank";

                                        $tampil = $conn->query($query);
                                        while ($c = $tampil->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $c['id']; ?></td>
                                                <td><?php echo $c['nama_bank']; ?></td>
                                                <td>
                                                    <a href="home.php?page=data_bank&&edit=<?php echo $c['id']; ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit</button>
                                                    </a>

                                                    <a href="aksi_bank.php?delete=<?php echo $c['id']; ?>">
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
</section> -->