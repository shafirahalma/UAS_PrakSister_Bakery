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
                    <h1 class="mt-4">Data Bank</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="container">

                        <a href="home.php?page=form_bank" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
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

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="exampleInputid" value="<?php echo $alamat; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Telepon</label>
                                        <input type="text" name="telepon" class="form-control" id="exampleInputid" value="<?php echo $telepon; ?>">
                                    </div>

                                    <?php
                                    if ($update == true) :
                                    ?>
                                        <input type="hidden" name="aksi" value="ubah">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    <?php else : ?>
                                        <input type="hidden" name="aksi" value="tambah">
                                        <button type="submit" name="insert" class="btn btn-primary" onclick="javascript:return confirm('Anda yakin insert data bank?');">Submit</button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
            </main>
            <!--End Table-->
        </div>
    </section>
</section>