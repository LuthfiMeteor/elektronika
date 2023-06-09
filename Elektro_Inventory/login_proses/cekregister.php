<?php  
session_start();
include "../config/koneksi.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$password1 = test_input($_POST['password_konfir']);
	$role = test_input($_POST['role']);
    $nama = test_input($_POST['nama']);

	$password = md5($password);
	$password1 = md5($password1);
	if (empty($username)) {
		header("Location: ../register.php?error=Mana Namanya Cuy");
	}else if (empty($password)) {
		header("Location: ../register.php?error=Eweh Passwordan COEK!");
	}else if ($password != $password1){
		header("Location: ../register.php?error=Masukan Password Yang Sama!");
	}else {
		$valid=mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$username'");
		$cek=mysqli_num_rows($valid);
        if($cek == 0){
			$sql = mysqli_query($conn,"INSERT INTO `tb_user`(`role`, `username`, `password`, `name`) VALUES ('$role','$username','$password','$nama')");
			echo "<script>
			alert('Berhasil Register, Silahkan Login');
			window.location.href='../login.php';
			</script>";
		}
		else{
			header("Location: ../register.php?error=Username Sudah Digunakan!");
		}
        


	}
	
}else {
	header("Location: ../register.php");
}