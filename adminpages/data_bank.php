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
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Bank</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include("client-bank.php");
                                        $dataBank = $bank->tampil_semua_data_bank();

                                        foreach ($dataBank as $data) { ?>
                                            <tr>
                                                <td><?php echo $data->id; ?></td>
                                                <td><?php echo $data->nama_bank; ?></td>
                                                <td><?php echo $data->alamat; ?></td>
                                                <td><?php echo $data->telepon; ?></td>
                                                <td>
                                                    <a href="home.php?page=form_bank&&edit=<?php echo $data->id; ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit</button>
                                                    </a>

                                                    <a href="aksi_bank.php?delete=<?php echo $data->id; ?>">
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