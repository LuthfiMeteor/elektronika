<?php 
session_start();
require_once 'config/koneksi.php';

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

$page = @$_GET['p'];
$aksi = @$_GET['aksi'];

// masih bug
// di halaman tambah transaksi
// di halaman transaksi/perpanjang.php
?>
<!-- <pre>
<?php var_dump($_SESSION['username']);  ?>
</pre> -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <title>
            <?php
            if($page == 'barang') {
                if($aksi == 'tambah') {
                    echo "Tambah barang";
                } else if($aksi == 'ubah') {
                    echo "Ubah barang";
                } else {
                    echo "Halaman barang";
                }
                
            } else if($page == 'anggota') {
                if($aksi == 'tambah') {
                    echo "Tambah Anggota";
                } else if($aksi == 'ubah') {
                    echo "Ubah Anggota";
                } else {
                    echo "Halaman Anggota";
                }
            } else if($page == 'transaksi') {
                if($aksi == 'tambah') {
                    echo "Tambah Transaksi";
                } else {
                    echo "Halaman Transaksi";
                }
            } else {
                echo "Dashboard";
            }
            // if(isset($page)) { 
            //     if($_GET['p'] == 'barang') {
            //         echo "Halaman barang";
            //     } else if($_GET['p'] == 'anggota') {
            //         echo "Halaman Anggota";
            //     } else if($_GET['p'] == 'transaksi') {
            //         echo "Halaman Transaksi";
            //     }
            // } else {
            //     echo "Dashboard";
            // }
            ?>
        </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/fontawesomeall.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
            <img src="img/Untitled-1.png" alt="ELEKTRONIKA" width="40" height="40">&nbsp;&nbsp;&nbsp;Elektronika
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
                    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#"><?= $_SESSION['name']; ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <?php if ($_SESSION['role'] == 'admin') { ?>
                            <a class="nav-link" href="?p=anggota">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                Data Anggota
                            </a>
                            <?php } ?>
                            <a class="nav-link" href="?p=barang">
                                <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-box"></i></div>
                                Data Barang
                            </a>
                            <a class="nav-link" href="?p=transaksi">
                                <div class="sb-nav-link-icon"><i class="fa fa-handshake" aria-hidden="true"></i></div>
                                Transaksi
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Login Sebagai:</div>
                        <?= $_SESSION['role']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <marquee behavior="scroll" class="btn btn-dark">Selamat Datang <b><?= $_SESSION['name']; ?></b> Di Web Data Inventaris Elektro</marquee>
                    <div class="container-fluid">
                        <!-- <h1 class="mt-4">Static Navigation</h1> -->
                    <?php 

                    if($page == 'barang') {
                        if($aksi == '') {
                            require_once 'page/barang/barang.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/barang/tambah.php';
                        } else if($aksi == 'ubah') {
                            require_once 'page/barang/ubah.php';
                        } else if($aksi == 'hapus') {
                            require_once 'page/barang/hapus.php';
                        }
                    } else if($page == 'anggota') {
                        if($aksi == '') {
                            require_once 'page/anggota/anggota.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/anggota/tambah.php';
                        } else if($aksi == 'ubah') {
                            require_once 'page/anggota/ubah.php';
                        } else if($aksi == 'hapus') {
                            require_once 'page/anggota/hapus.php';
                        }
                    } else if($page == 'transaksi') {
                        if($aksi == '') {
                            require_once 'page/transaksi/transaksi.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/transaksi/tambah.php';
                        } else if($aksi == 'kembali') {
                            require_once 'page/transaksi/kembali.php';
                        } else if($aksi == 'perpanjang') {
                            require_once 'page/transaksi/perpanjang.php';
                        }
                    } else { ?>
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li> -->
                            <li class="breadcrumb-item active">dashboard</li>
                        </ol>
                        <div class="p-3 mb-2 bg-warning text-dark rounded"><center> Web Ini Masih Dalam Pengembangan</center></div>
                    <?php
                    }
                    ?>
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Luthfi_Novalino</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/chart-area-demo.js"></script> -->
        <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables.js"></script>
        <script src="js/all.min.js"></script>
    </body>
</html>
<?php }else{
    echo '<script type="text/javascript">
        alert("Silahkan Login Terlebih Dahulu!");
        document.location.href = "login.php";
        </script>'; 
}
 ?>
