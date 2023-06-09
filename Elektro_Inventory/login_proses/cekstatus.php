<?php  
session_start();
include "../config/koneksi.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = md5($_POST['password']);

	if (empty($username)) {
		header("Location: ../login.php?error=Mana Namanya Cuy");
	}else if (empty($password)) {
		header("Location: ../login.php?error=Eweh Passwordan COEK!");
	}else {
        
        $sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];

        		header("Location: ../index.php");

        	}else {
        		header("Location: ../login.php?error=Username/Password Salah");
        	}
        }else {
        	header("Location: ../login.php?error=Username/Password Salah");
        }

	}
	
}else {
	header("Location: ../login.php");
}