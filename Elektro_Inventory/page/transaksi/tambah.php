<?php 
if ($_SESSION['role'] == 'admin') {
// menampilkan judul barang di TB_barabg di bagian option pilih barang
$tampilNamabarang = $conn->query("SELECT * FROM tb_barang ORDER BY kategori") or die(mysqli_error($conn));

// menampilkan nama anggota & nim di TB_anggota di bagian option pilih anggota
$tampilNamaAnggota = $conn->query("SELECT * FROM tb_anggota ORDER BY nim") or die(mysqli_error($conn));

// $sql = $conn->query("SELECT * FROM tb_barang INNER JOIN tb_anggota ON tb_barang.id_barang = tb_anggota.id_anggota") or die(mysqli_error($conn));

$tgl_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('d-m-Y', $tujuh_hari);

if(isset($_POST['tambah'])) {
    
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);
    
    // $nama_barang = $_POST['barang'];
    // $pecahB = explode(".", $nama_barang);
    // $judul = $pecahB[0];
    $nama_barang = $_POST['barang'];
    $pecahB = explode(".", $nama_barang);
    $id = $pecahB[0];
    $judul = $pecahB[1];
    // var_dump($id); 
    // var_dump($judul); die;

    // $nama_anggota = $_POST['nama'];
    // $pecahN = explode(".", $nama_anggota);
    // $nim = $pecahN[0];
    $nama_anggota = $_POST['nama'];
    $pecahN = explode(".", $nama_anggota);
    $nim = $pecahN[0];
    $nama = $pecahN[1];

    $sql = $conn->query("SELECT * FROM tb_barang WHERE nama_brg = '$judul'") or die(mysqli_error($conn));
    while($data = $sql->fetch_assoc()) {
        $sisa = $data['jumlah_brg'];

        if($sisa == 0) {
            echo "<script>alert('Stok barang Habis, Transaksi, tidak dapat dilakukan, silahkan tambahkan stok barang dulu.');window.location='?p=transaksi&aksi=tambah';</script>";
        } else {
            $conn->query("INSERT INTO tb_transaksi VALUES(null, '$id', '$nim', '$nim', '$tgl_pinjam', '$tgl_kembali', 'pinjam')") or die(mysqli_error($conn));
            $conn->query("UPDATE tb_barang SET jumlah_brg = (jumlah_brg-1) WHERE kode_brg = '$id'") or die(mysqli_error($conn));
            echo "<script>alert('Data transaksi berhasil ditambahkan.');window.location='?p=transaksi';</script>";
        }
    }
}


?>

<h1 class="mt-4">Tambah Data Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data transaksi</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    
    <div class="form-group">
        <label class="small mb-1" for="nama_barang">Barang</label>
        <select name="barang" id="nama_barang" class="form-control">
            <option value="">-- Pilih Barang --</option>
            <?php 
            while ($pecahbarang = $tampilNamabarang->fetch_assoc()) {
            echo "<option value='$pecahbarang[kode_brg].$pecahbarang[nama_brg]'>$pecahbarang[nama_brg]</option>";
            
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama</label>
        <select name="nama" id="nama_anggota" class="form-control">
            <option value="">-- Pilih Anggota --</option>
            <?php 
            while ($pecahAnggota = $tampilNamaAnggota->fetch_assoc()) {
            echo "<option value='$pecahAnggota[id_anggota].$pecahAnggota[nama_anggota]'>$pecahAnggota[nim].$pecahAnggota[nama_anggota]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $tgl_pinjam ?>">
    </div>
    <div class="form-group">
        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="" value="<?= $kembali ?>">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>
<?php }else{
    echo '<script type="text/javascript">
    alert("Kamu Bukan Admin!");
    document.location.href = "index.php";
    </script>'; 
} ?>