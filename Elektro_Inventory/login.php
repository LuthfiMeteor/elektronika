<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
   

   
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
      	      action="login_proses/cekstatus.php" 
      	      method="post" 
      	      style="width: 450px;">
			  <center><img src="img/Untitled-1.png" alt="" class="img"></center>
      	      <h1 class="text-center p-3">LOGIN</h1>
			  
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">Username</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username" >
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
				   <input type="checkbox" onclick="pass()">&nbsp;Show Password
				   <br>
				   <a href="register.php">Belum Punya Akun? Register!</a>
				   <br>
				   <br>
				   <br>
		  <!-- </div>
		 	 <div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" name="ingataku">
			<label class="form-check-label" for="exampleCheck1">Remember Me</label>
			</div> -->
		  <center><button type="submit" 
		          class="btn btn-primary">LOGIN</button><br><br>

			
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
<?php }else{
header("Location: index.php");
} ?>