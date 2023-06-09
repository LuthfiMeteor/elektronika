    <?php 
if(isset($_POST['tambah'])) {
	$nama = htmlspecialchars($_POST['nama_brg']);
	$kategori = htmlspecialchars($_POST['kategori']);
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$p_jawab = htmlspecialchars($_POST['p_jawab']);
	$tgl_input = htmlspecialchars($_POST['tgl_input']);

    if(empty($nama && $kategori && $jumlah && $p_jawab && $tgl_input)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=barang';</script>";
    }

	$sql = $conn->query("INSERT INTO tb_barang VALUES (null, '$nama', '$kategori', '$p_jawab', '$jumlah', '$tgl_input')") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=barang';</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan.')</script>";
	}
}

?>

<h1 class="mt-4">Tambah Data Barang</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data Barang</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="judul_barang">Nama Barang</label>
        <input class="form-control" id="nama_brg" name="nama_brg" type="text" placeholder="Masukan Nama Barang"/>
    </div>
    <div class="form-group">
    	<label for="lokasi">Kategori</label>
    	<select name="kategori" id="kategori" class="form-control">
    		<option value="">-- Kategory --</option>
    		<option value="Alat Berat">Alat Berat</option>
    		<option value="Solder">Solder</option>
    		<option value="Alat Kebersihan">Alat Kebersihan</option>
    	</select>
    </div>
    <div class="form-group">
    	<label for="tgl_input">Jumlah Barang</label>
    	<input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah Barang">
    </div>
    <div class="form-group">
        <label class="small mb-1" for="penganggung_jawab">Penanggung Jawab</label>
        <input class="form-control" id="p_jawab" name="p_jawab" type="text" placeholder="Penganggung Jawab"/>
    </div>
    <div class="form-group">
    	<label for="tgl_input">Tanggal Input</label>
    	<input type="date" name="tgl_input" id="tgl_input" class="form-control">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>