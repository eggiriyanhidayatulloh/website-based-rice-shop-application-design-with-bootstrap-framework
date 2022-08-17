<?php 
session_start();
$koneksi = new mysqli("localhost","root","","tokoberas");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<link href='//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'/>
    <script src="admin/assets/js/jquery-3.2.1.min.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navbar -->

<!-- Akhir Nav -->
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<br><br>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" required>
							</div>
							<div class="form-group">
								<label>Password</label>
			   					<input type="password" class="form-control" name="password" required>
							</div>
							<button class="btn btn-primary" name="daftar">Daftar</button>
							<hr />
                            Sudah punya akun ? <a href="login.php" >Masuk disini</a> 
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php  
if (isset($_POST['daftar'])) 
{
	
	$koneksi->query("INSERT INTO pelanggan 
		(email_pelanggan,password_pelanggan)
		VALUES('$_POST[email]','$_POST[password]')");

	//echo "<script>alert('Data telah tersimpan')</script>";
	//echo "<script>location='login.php';</script>";
	echo "<div class='alert alert-info'>Anda telah berhasil daftar,<br>Silahkan Login</div>";
	echo "<meta http-equiv='refresh' content='5;url=login.php'>";
}
?>


</body>
</html>