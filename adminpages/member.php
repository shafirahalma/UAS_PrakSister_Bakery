<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Member</h1>
                    <ol class="breadcrumb mb-4">
                        <a href="register.php" style="margin-right: 0.5pc;" class="btn btn-success btn-md pull-right">
                            <i class="fa fa-refresh"></i> Tambah Admin
                        </a>
                        <div class="clearfix"></div>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Table Member
                        </div>
                        <div class="card-body">
                            <form action="aksi_member.php" method="post">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Asal Kota</th>
                                            <th>Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Asal Kota</th>
                                            <th>Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include "config/config.php";
                                        $query = "SELECT * FROM member";
                                        $tampil = $conn->query($query);
                                        while ($c = $tampil->fetch_array()) { ?>
                                            <tr>
                                                <td><input type="checkbox" name="delete[]" value="<?php echo $c['username']; ?>"></td>
                                                <td><?php echo $c['username']; ?></td>
                                                <td><?php echo $c['password']; ?></td>
                                                <td><?php echo $c['nama_lengkap']; ?></td>
                                                <td><?php echo $c['tgl_lahir']; ?></td>
                                                <td><?php echo $c['alamat']; ?></td>
                                                <td><?php echo $c['asal_kota']; ?></td>
                                                <td><?php echo $c['telepon']; ?></td>
                                                <td><?php echo $c['jk']; ?></td>
                                                <td>
                                                    <a href="download_member.php?username=<?php echo $c['username']; ?>&nama=<?php echo $c['nama_lengkap']; ?>&tgl_lahir=<?php echo $c['tgl_lahir']; ?>&alamat=<?php echo $c['alamat']; ?>&asal_kota=<?php echo $c['asal_kota']; ?>&telepon=<?php echo $c['telepon']; ?>&jk=<?php echo $c['jk']; ?>" class="btn btn-primary btn-sm btn-success">Download</a>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-danger" name="deleteButton">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!--content-->
                    <div class="modal-content" style="border-radius: 0px;">
                        <div class="modal-header" style="background: #285c64; color: #fff;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>