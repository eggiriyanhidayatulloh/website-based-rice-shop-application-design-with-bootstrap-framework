<?php 

session_start();
$koneksi = new mysqli("localhost","root","","tokoberas");
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
            <meta charset="UTF-8">
            <title>Login Pelanggan</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

        
        </head>
            <body>
                <!--navbar-->

                <div class="container">
                    <h4 class="text-center">Form Login</h4>
                    <hr>
                    <form method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                            <input type="email" name="email" class="form-control" placeholder="Masukan email Anda " required>
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda" required>
                        </div>
                    </div>
                    <br><br>
                        <button type="submit" class="btn btn-primary" name="login">LOGIN</button>
                        <button type="reset" class="btn btn-danger">RESET</button>
                        <hr/>
                        Belum punya akun ? <a href="daftar.php" >Daftar disini</a> 
                    </form>
                </div>

                <?php 
// jika ada tombol login(tombol login ditekan)
if (isset($_POST["login"])) 
{

	$email = $_POST["email"];
	$password = $_POST["password"];
	// lakukan query ngecek akun dari tabel pelanggan di database
	$ambil = $koneksi->query("SELECT * FROM pelanggan 
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	// ngitung akun yang terambil
	$akunyangcocok = $ambil->num_rows;

	// jika satu akaun yang cocok, maka diloginkan
	if ($akunyangcocok==1) 
	{
		// anda sudah login
		// mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		// simpan di session pelanggan
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('Anda Sukses Login');</script>";
		echo "<script>location='index.php';</script>";
	}
	else
	{
		// anda gagal login
		echo "<script>alert('Anda Gagal Login! Periksa Akun Anda');</script>";
		echo "<script>location='login.php';</script>";
	}
}

?>
            

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
    </html>