<?php 
if(isset($_POST['tambah'])) {
	$nim = htmlspecialchars($_POST['nim']);
	$nama = htmlspecialchars($_POST['nama_anggota']);
	$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
	$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
	$jk = htmlspecialchars($_POST['jk']);
	$jurusan = htmlspecialchars($_POST['jurusan']);

    if(empty($nim && $nama && $tempat_lahir && $tgl_lahir && $jk && $jurusan)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=anggota';</script>";
    }

	$sql = $conn->query("INSERT INTO tb_anggota VALUES (null, '$nim', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$jurusan')") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=anggota';</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan.')</script>";
	}
}

?>

<h1 class="mt-4">Tambah Data Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data anggota</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="nim">NIS</label>
        <input class="form-control" id="nim" name="nim" type="number" placeholder="Masukan NIS Siswa"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama</label>
        <input class="form-control" id="nama_anggota" name="nama_anggota" type="text" placeholder="Masukan Nama Siswa"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
        <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Tempat Lahir"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jk">Jenis Kelamin</label>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="jk" value="L" class="custom-control-input">
          <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="jk" class="custom-control-input" value="P">
          <label class="custom-control-label" for="customRadio2">Perempuan</label>
        </div>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jumlah_brg">Jurusan</label>
        <select name="jurusan" id="jurusan" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            <option value="PPLG">PPLG</option>
            <option value="BP">BP</option>
            <option value="ELEKTRONIKA">ELEKTRO</option>
            <option value="OTOMOTIF">OTOMOTIF</option>
            <option value="MESIN">MESIN</option>
            <option value="TKR">TKR</option>
            <option value="TEXTIL">TEXTIL</option>
        </select>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>