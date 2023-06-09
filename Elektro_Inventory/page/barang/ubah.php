<?php 

// menangkap kd_barang di url
$kdbarang = $_GET['id'];

// menampilkan data db sesuai kd_brg
$sql = $conn->query("SELECT * FROM tb_barang WHERE kode_brg = $kdbarang") or die(mysqli_error($conn));
$pecahSql = $sql->fetch_assoc();


if(isset($_POST['ubah'])) {
	$nama = htmlspecialchars($_POST['nama_brg']);
	$kategori = htmlspecialchars($_POST['kategori']);
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$p_jawab = htmlspecialchars($_POST['p_jawab']);
	$tgl_input = htmlspecialchars($_POST['tgl_input']);

    if(empty($nama && $kategori && $jumlah && $p_jawab && $tgl_input)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=barang';</script>";
    }

	$sql = $conn->query("UPDATE tb_barang SET nama_brg = '$nama', kategori = '$kategori', p_jawab = '$p_jawab',jumlah_brg = '$jumlah', tgl_input = '$tgl_input' WHERE kode_brg = $kdbarang") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Data Berhasil Diubah.');window.location='?p=barang';</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah.');window.location='?p=barang';</script>";
	}
}

?>

<h1 class="mt-4">Ubah Data Barang</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">Ubah data barang</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="nama_brg">Nama Barang</label>
        <input class="form-control" id="nama_brg" name="nama_brg" type="text" placeholder="Masukan Nama Barang" value="<?= $pecahSql['nama_brg']; ?>"/>
    </div>
    <div class="form-group">
    	<label for="lokasi">Kategori</label>
    	<select name="kategori" id="kategori" class="form-control">
    		<option value="">-- Kategory --</option>
            <option value="Alat Berat" <?php if($pecahSql['kategori'] == 'Alat Berat'){echo "selected";} ?> >Alat Berat</option>
    		<option value="Solder" <?php if($pecahSql['kategori'] == 'Solder'){echo "selected";} ?> >Solder</option>
    		<option value="Alat Kebersihan" <?php if($pecahSql['kategori'] == 'Alat Kebersihan'){echo "selected";} ?> >Alat Kebersihan</option>
    	</select>
    </div>
    <div class="form-group">
    	<label for="tgl_input">Jumlah Barang</label>
    	<input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah Barang" value="<?= $pecahSql['jumlah_brg']; ?>">
    </div>
    <div class="form-group">
        <label class="small mb-1" for="penanggung_jawab">Penanggung Jawab</label>
        <input class="form-control" id="p_jawab" name="p_jawab" type="text" placeholder="Penganggung Jawab" value="<?= $pecahSql['p_jawab']; ?>"/>
    </div>
    <div class="form-group">
    	<label for="tgl_input">Tanggal Input</label>
    	<input type="date" name="tgl_input" id="tgl_input" class="form-control" value="<?= $pecahSql['tgl_input']; ?>">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="ubah">Update Data</button>
    </div>
	</form>
</div>