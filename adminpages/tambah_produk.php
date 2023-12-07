<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Data</h1>
                    <ol class="breadcrumb mb-4"></ol>
                    <div class="container">
                        <div class="card mb-4">
                            <!-- <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form
            </div> -->
                            <div class="card-body">
                                <form action="aksi_produk.php" method="post" enctype="multipart/form-data">
                                    <?php
                                    $jml = $_POST['jum'];
                                    $no = 1;
                                    for ($i = 1; $i <= $jml; $i++) : ?>
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>
                                            Form <?= $no++ ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputNama" class="form-label">Kategori</label>
                                            <input type="text" name="kategori[]" class="form-control" id="exampleInputnama_kue">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputNama" class="form-label">Nama Kue</label>
                                            <input type="text" name="nama_kue[]" class="form-control" id="exampleInputnama_kue">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputNama" class="form-label">Deskripsi</label>
                                            <input type="text" name="deskripsi[]" class="form-control" id="ExampleInputDeskripsi">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputGambar" class="form-label">Gambar</label>
                                            <input type="file" name="gambar_kue[]" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputNama" class="form-label">Harga</label>
                                            <input type="text" name="harga_kue[]" class="form-control" id="exampleInputharga_kue">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputNama" class="form-label">Status</label>
                                            <select class="form-select" aria-label=".form-select-lg example" name="status_kue[]">
                                                <option value="ada">Ada</option>
                                                <option value="kosong">Kosong</option>
                                            </select>
                                        </div><br><br>
                                    <?php endfor; ?>
                                    <button type="submit" name="insert" class="btn btn-primary" onclick="javascript:return confirm('Anda yakin insert data?');">Submit</button>
                                    <input type="hidden" name="jum" value="<?= $jml; ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>
</section>