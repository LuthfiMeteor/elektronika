
<?php 
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	echo '<script type="text/javascript">
        alert("Kamu Udah Login!");
        document.location.href = "home.php";
        </script>'; 
}else{


 ?><!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style>
		.img{
width: 60px;
position: relative;

		}
	</style>
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
      	      action="login_proses/cekregister.php" 
      	      method="post" 
      	      style="width: 450px;">
				<center><img src="img/Untitled-1.png" alt="" class="img"></center>
      	      <h1 class="text-center p-3">REGISTER</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
              <div class="mb-3">
		    <label for="username" 
		           class="form-label">Nama</label>
		    <input type="text" 
		           class="form-control" 
		           name="nama" 
		           id="nama">
		  </div>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">Username</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Konfirmasi Password</label>
		    <input type="password" 
		           name="password_konfir" 
		           class="form-control" 
		           id="password">
		  </div>
		  <select class="form-select mb-3" hidden
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="user">User</option>
			  
		  </select>
		  <input type="checkbox" onclick="pass()">&nbsp;Show Password
		  <br>
		  <a href="login.php">Sudah Punya Akun? Login!</a>
		  <br>
		  <br>
		  <center>
          <button type="submit" 
		          class="btn btn-primary">Register Sekarang!</button><br>
				  <br>
				  
		</form>
		<a href="../index.html" class="btn btn-primary">HOME</a></center>
      </div>
	  <script>
		function pass() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
		}
	  </script>
</body>
</html>
<?php } ?> 

