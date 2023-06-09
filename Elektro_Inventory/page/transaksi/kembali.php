<?php 
$id_transaksi = $_GET['id'];
$id_nama = $_GET['nama'];

$conn->query("UPDATE tb_transaksi SET status = 'kembali' WHERE id_transaksi = $id_transaksi") or die(mysqli_error($conn));

$conn->query("UPDATE tb_barang SET jumlah_brg = (jumlah_brg+1) WHERE nama_brg = '$id_nama'") or die(mysqli_error($conn));

	echo "<script>alert('Proses, Pengembalian barang berhasil.');window.location='?p=transaksi';</script>";

?>