<?php 

$id_anggota = $_GET['id'];

$tampilAnggota = $conn->query("SELECT * FROM tb_anggota WHERE id_anggota = $id_anggota") or die(mysqli_error($conn));
$pecahAnggota = $tampilAnggota->fetch_assoc();

if(isset($_POST['ubah'])) {
	$nim = htmlspecialchars($_POST['nim']);
	$nama = htmlspecialchars($_POST['nama_anggota']);
	$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
	$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
	$jk = htmlspecialchars($_POST['jk']);
	$jurusan = htmlspecialchars($_POST['jurusan']);

	$sql = $conn->query("UPDATE tb_anggota SET nim = '$nim', nama_anggota = '$nama', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jk = '$jk', jurusan = '$jurusan' WHERE id_anggota = $id_anggota") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Data Berhasil Diubah.');window.location='?p=anggota';</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah.');window.location='?p=anggota';</script>";
	}
}

?>

<h1 class="mt-4">Ubah Data Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">ubah data anggota</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="nim">NIM</label>
        <input class="form-control" id="nim" name="nim" value="<?= $pecahAnggota['nim']; ?>" type="number" placeholder="Masukan NIM"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama</label>
        <input class="form-control" id="nama_anggota" value="<?= $pecahAnggota['nama_anggota']; ?>" name="nama_anggota" type="text" placeholder="Masukan Nama"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
        <input class="form-control" id="tempat_lahir" value="<?= $pecahAnggota['tempat_lahir']; ?>" name="tempat_lahir" type="text" placeholder=""/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" value="<?= $pecahAnggota['tgl_lahir']; ?>" id="tgl_lahir" class="form-control">
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jk">Jenis Kelamin</label>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="jk" value="L" class="custom-control-input" <?php if($pecahAnggota['jk'] == 'L'){echo "checked";} ?> >
          <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="jk" class="custom-control-input" value="P" <?php if($pecahAnggota['jk'] == 'P'){echo "checked";} ?> >
          <label class="custom-control-label" for="customRadio2">Perempuan</label>
        </div>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jumlaH_brg">Prodi</label>
        <select name="jurusan" id="jurusan" class="form-control">
            <option value="">-- Pilih Prodi --</option>
            <option value="PPLG" <?php if($pecahAnggota['jurusan'] == 'PPLG'){echo "selected";} ?> >PPLG</option>
            <option value="BP" <?php if($pecahAnggota['jurusan'] == 'BP'){echo "selected";} ?> >BP</option>
            <option value="ELEKTRONIKA" <?php if($pecahAnggota['jurusan'] == 'ELEKTRONIKA'){echo "selected";} ?> >ELEKTRO</option>
            <option value="OTOMOTIF" <?php if($pecahAnggota['jurusan'] == 'OTOMOTIF'){echo "selected";} ?> >OTOMOTIF</option>
            <option value="MESIN" <?php if($pecahAnggota['jurusan'] == 'MESIN'){echo "selected";} ?> >MESIN</option>
            <option value="TKR" <?php if($pecahAnggota['jurusan'] == 'TKR'){echo "selected";} ?> >TKR</option>
            <option value="TEXTIL" <?php if($pecahAnggota['jurusan'] == 'TEXTIL'){echo "selected";} ?> >TEXTIL</option>
        </select>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
    </div>
	</form>
</div>