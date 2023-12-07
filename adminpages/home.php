<?php
session_start();
?>

<?php
// if (isset($_GET['logout'])) {
//     session_destroy();
//     header('location:index.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest minified bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <!-- Latest minified bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <!-- <a class="navbar-brand ps-3" href="home.php"><?php echo $_SESSION['username'] ?></a> -->
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Dashboard</div>

                        <hr class="sidebar-divider my-0">
                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                            Dashboard
                        </a>
                        <hr class="sidebar-divider my-0">

                        <div class="sb-sidenav-menu-heading">Menu Utama</div>

                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fa fa-bars-staggered"></i></div>
                            Data Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <hr class="sidebar-divider my-0">

                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Data Penjualan
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- <a class="nav-link" href="?page=member">Data Member</a> -->
                                        <a class="nav-link" href="?page=data_produk">Data Produk</a>
                                        <a class="nav-link" href="?page=data_pesanan">Data Pesanan</a>
                                        <a class="nav-link" href="?page=data_pembayaran">Data Pembayaran</a>
                                        <a class="nav-link" href="?page=data_bank">Data Bank</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#formCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Form Penjualan
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="formCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- <a class="nav-link" href="?page=member">Data Member</a> -->
                                        <a class="nav-link" href="?page=form_bank">Form Bank</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Tambahan</div>

                        <hr class="sidebar-divider my-0">
                        <a class="nav-link" href="home.php?page=data_resep">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                            Data Resep Bakery
                        </a>
                        <hr class="sidebar-divider my-0">

                        <hr class="sidebar-divider my-0">
                        <a class="nav-link" href="home.php?page=form_resep">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                            Form Resep Bakery
                        </a>
                        <hr class="sidebar-divider my-0">

                    </div>
                </div>
                <!-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    echo $_SESSION['username'];
                    ?>
                </div> -->
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <!-- Content -->
            <?php
            if (!isset($_GET['page']) || $_GET['page'] == 'dashboard') {
                echo "<h1>Selamat datang!</h1>";
                // if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
                //     include "dashboard.php";
            } elseif (@$_GET['page'] == 'data_bank') {
                include "data_bank.php";
            } elseif (@$_GET['page'] == 'data_admin') {
                include "data_admin.php";
            } elseif (@$_GET['page'] == 'member') {
                include "member.php";
            } elseif (@$_GET['page'] == 'data_produk') {
                include "data_produk.php";
            } elseif (@$_GET['page'] == 'data_masukan') {
                include "data_masukan.php";
            } elseif (@$_GET['page'] == 'data_pesanan') {
                include "data_pesanan.php";
            } elseif (@$_GET['page'] == 'data_pembayaran') {
                include "data_pembayaran.php";
            } elseif (@$_GET['page'] == 'data_resep') {
                include "data_resep.php";
            } elseif (@$_GET['page'] == 'form_resep') {
                include "form_resep.php";
            } elseif (@$_GET['page'] == 'toko_bahan') {
                include "toko_bahan.php";
            } elseif (@$_GET['page'] == 'tambah_admin') {
                include "tambah_admin.php";
            } elseif (@$_GET['page'] == 'tambah_produk') {
                include "tambah_produk.php";
            } elseif (@$_GET['page'] == 'form_bank') {
                include "form_bank.php";
            }
            ?>


            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--End COntent-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>