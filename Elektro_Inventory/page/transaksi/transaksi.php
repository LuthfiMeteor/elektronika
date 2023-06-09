<?php 
require_once 'function.php';
// menampilkan DB barang
// $ambilTransaksi = $conn->query("SELECT * FROM tb_transaksi WHERE status = 'pinjam'") or die(mysqli_error($conn));

$sql = $conn->query("SELECT * FROM tb_transaksi INNER JOIN tb_barang
										ON tb_transaksi.kode_brg = tb_barang.kode_brg INNER JOIN tb_anggota 
										ON tb_transaksi.id_anggota = tb_anggota.id_anggota WHERE status = 'pinjam'
										") or die(mysqli_error($conn));

?>
<!-- <pre>
	<?php var_dump($pecah); ?>
</pre> -->
<h1 class="mt-4">Data Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data transaksi</li>
</ol>
<?php if ($_SESSION['role'] == 'admin') { ?>
<div class="col-md-6">
    <a href="?p=transaksi&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Transaksi</a>
</div>
<?php } ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Transaksi
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Terlambat</th>
                        <th>Status</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                        <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($pecah = $sql->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pecah['nim']; ?></td>
                        <td><?=$pecah['nama_anggota'];  ?></td>
                        <td><?= $pecah['nama_brg']; ?></td>
                        <td><?= $pecah['tgl_pinjam']; ?></td>
                        <td><?= $pecah['tgl_kembali']; ?></td>
                        <td>
                        	<?php 
                        	$denda = 1000;
                        	$tgl_dateline = $pecah['tgl_kembali'];
                        	$tgl_kembali = date('d-m-Y');

                        	$lambat = terlambat($tgl_dateline, $tgl_kembali);
                        	$denda1 = $lambat * $denda;

                        	if($lambat > 0) { ?>
                        		<div style='color:red;'><?= $lambat ?> hari<br> (Rp. <?= number_format($denda1) ?>)</div>
                        	<?php
                        	} else {
                        		echo $lambat . "Hari";
                        	}
                        	?>
                        </td>
                        <td><?= $pecah['status']; ?></td>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                        <td>
                            <a href="?p=transaksi&aksi=kembali&id=<?= $pecah['id_transaksi']; ?>&nama=<?= $pecah['nama_brg']; ?>" class="btn btn-info btn-sm">Kembali</a>
                            <a href="?p=transaksi&aksi=perpanjang&id=<?= $pecah['id_transaksi']; ?>&nama=<?= $pecah['nama_brg']; ?>&lambat=<?= $lambat ?>&tgl_kembali=<?= $pecah['tgl_kembali']; ?>" class="btn btn-success btn-sm">Perpanjang</a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>