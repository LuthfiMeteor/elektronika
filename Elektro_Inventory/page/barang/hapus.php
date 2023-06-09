<?php 
// menangkap kd_brg di url
$kode_brg = $_GET['id'];

$conn->query("DELETE FROM tb_barang WHERE kode_brg = $kode_brg") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=barang';</script>";

?>