<?php 
// menampilkan DB barang
$ambilbarang = $conn->query("SELECT * FROM tb_barang ORDER BY kategori DESC") or die(mysqli_error($conn));

?>
<h1 class="mt-4">Data Inventaris Bengkel Elektro</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data Inventaris</li>
</ol>
<?php if ($_SESSION['role'] == 'admin') { ?>
<div class="col-md-6">
    <a href="?p=barang&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Barang</a>
</div>
<?php } ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Barang
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Kode Barang</th>
                        <th>Category</th>
                        <th>Penanggung Jawab</th>
                        <th>Jumlah Barang</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                        <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($pecahbarang = $ambilbarang->fetch_assoc()) {
                    
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pecahbarang['nama_brg']; ?></td>
                        <td><?= $pecahbarang['kode_brg']; ?></td>
                        <td><?= $pecahbarang['kategori']; ?></td>
                        <td><?= $pecahbarang['p_jawab']; ?></td>
                        <td><?= $pecahbarang['jumlah_brg']; ?></td>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                        <td>
                            <a href="?p=barang&aksi=ubah&id=<?= $pecahbarang['kode_brg']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="?p=barang&aksi=hapus&id=<?= $pecahbarang['kode_brg']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin ?')"></i></a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>