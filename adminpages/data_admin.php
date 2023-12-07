<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Admin</h1>
                    <ol class="breadcrumb mb-4">
                        <a href="register.php" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
                            <i class="fa fa-refresh"></i> Tambah Admin</a>
                        <div class="clearfix"></div>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Table Admin
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    include "config/config.php";
                                    $query = "SELECT * FROM admin";

                                    $tampil = $conn->query($query);
                                    while ($c = $tampil->fetch_array()) { ?>
                                        <tr>
                                            <td><?php echo $c['username']; ?></td>
                                            <td><?php echo $c['nama_lengkap']; ?></td>
                                            <td><?php echo $c['tgl_lahir']; ?></td>
                                            <td><?php echo $c['alamat']; ?></td>
                                            <td><?php echo $c['telepon']; ?></td>
                                            <td><?php echo $c['jk']; ?></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>


            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!--content-->
                    <div class="modal-content" style=" border-radius:0px;">
                        <div class="modal-header" style="background:#285c64;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</section>