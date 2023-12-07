<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <main>
                <?php if (isset($_GET['remove'])) { ?>
                    <div class="alert alert-danger" isset>
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
                    <h1 class="mt-4">Data Resep</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="container">

                        <a href="home.php?page=form_resep" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
                            <i class="fa fa-refresh"></i> Refresh Data</a>
                        <div class="clearfix"></div>
                        <br />

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form
                            </div>
                            <div class="card-body">
                                <form method="POST" action="aksi_resep.php" enctype="multipart/form-data">
                                    <?php include 'aksi_resep.php'; ?>
                                    <?php
                                    if ($update == true) :
                                    ?>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Id resep</label>
                                            <input type="text" name="id_resep" class="form-control" id="exampleInputid" aria-describedby="id" value="<?php echo $id ?>" readonly>
                                        </div>

                                    <?php else : ?>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Id resep</label>
                                            <input type="text" name="id_resep" class="form-control" id="exampleInputid" aria-describedby="id" value="<?php echo $kodeResep ?>" readonly>
                                        </div>
                                    <?php endif;
                                    if ($update == true) :
                                    ?>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Id Kue</label>
                                            <input type="text" name="id_kue" class="form-control" id="exampleInputid" aria-describedby="id" value="<?php echo $nama_kue ?>" readonly>
                                        </div>
                                    <?php else : ?>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Id Kue</label>
                                            <select class="form-select" aria-label=".form-select-lg example" name="id_kue">
                                                <option selected>Pilih Kue</option>
                                                <?php
                                                foreach ($produk as $produkResep) { ?>
                                                    <option value="<?php echo $produkResep->id_kue; ?>"><?php echo $produkResep->id_kue; ?> -> <?php echo $produkResep->nama; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Bahan Bahan</label>
                                        <textarea name="bahan" rows="10" class="form-control" id="exampleInputnama_bank"><?php echo $bahan; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Cara Membuat</label>
                                        <textarea name="cara_buat" rows="10" class="form-control" id="exampleInputnama_bank"><?php echo $cara_buat; ?></textarea>
                                    </div>

                                    <?php if ($update == true) : ?>
                                        <div class="mb-3">
                                            <img src="gambar_resep/<?php echo $gambar ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                                            <input type="file" name="gambar" class="form-control" id="exampleInputnama_bank" disabled>
                                            <i>Nb: Gambar tidak dapat di ubah</i>
                                        </div>
                                    <?php else : ?>
                                        <div class="mb-3">
                                            <label for="exampleInputNama" class="form-label">Gambar Resep</label>
                                            <input type="file" name="gambar" class="form-control" id="exampleInputnama_bank">
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    if ($update == true) :
                                    ?>
                                        <input type="hidden" name="aksi" value="ubah">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    <?php else : ?>
                                        <input type="hidden" name="aksi" value="tambah">
                                        <button type="submit" name="insert" class="btn btn-primary" onclick="javascript:return confirm('Anda yakin insert data?');">Submit</button>
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