<?php 
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","tokoberas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hubungi Kami</title>

	<link href='//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'/>
    <script src="admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="admin/assets/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top "id="mainNav">
        <div class="container">
            <h3><i class="fas fa-shopping-cart text-white mr-3 mt-2 ml-2"></i></h3>
        <a class="navbar-brand  font-weight-bold mt-1" href="#page-top">AGEN BERASTANI</a>
        <button class="navbar-toggler navbar-toggler-right " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">                   
                    <a class="nav-link js-scroll-trigger " data-toggle="tooltip" title="Home" href="index.php">Beranda</a>
            </li>
			<li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Kategori Produk" href="kategoriproduk.php">Kategori Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Keranjang" href="keranjang.php">Keranjang</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Tentang Kami" href="hubungi.php">Hubungi kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Kontak Kami" href="kontak.php">Kontak kami</a>
            </li>
            <!-- Jika sudah(ada session_pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])): ?>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Login" href="logout.php">Keluar</a>
            </li>
            <!-- selain itu(blm login/belum ada session_pelanggan) -->
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Kontak Kami" href="login.php">Masuk</a>
            </li>
            <?php endif ?>
            
                </ul>
        </div>
	</nav>
<!-- Akhir Nav -->

<br><br><br>
<!-- isi section form hubungi kami -->
	<h1 class="text-center">Hubungi Kami</h1><br>
	<div class="text-center">
	<p>Silahkan isi form dibawah ini untuk menyampaikan keluhan, pesan, dan saran anda</p>
	</div>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Pengisian form</h3>
	</div>
<div class="panel-body">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama *</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label>Email *</label>
		<input type="email" class="form-control" name="email" required>
	</div>
	<div class="form-group">
		<label>Nomor Telepon *</label>
		<input type="text" class="form-control" name="telepon" required>
	</div>
	<div class="form-group">
		<label>Pesan *</label>
		<textarea name="pesan" cols="43" rows="7"></textarea>
	</div>
	<div class="form-group">
		<label>Foto Pendukung *</label>
		<input type="file" class="form-control" name="foto" required>
	</div>
	<button class="btn btn-primary" name="save">Kirim Pesan</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- akhir section form hubungi kami -->

<?php  
if (isset($_POST['save'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi,"keluhan/".$nama);
	$koneksi->query("INSERT INTO keluhan 
		(nama,email,telepon,pesan,foto)
		VALUES('$_POST[nama]','$_POST[email]','$_POST[telepon]','$_POST[pesan]','$nama')");

	echo "<script>alert('Pesan Berhasil Terkirim, Kami akan segera membalas secepatnya, Terimakasih')</script>";
	echo "<script>location='index.php';</script>";
	//echo "<div class='alert alert-info'>Data telah tersimpan</div>";
	//echo "<meta http-equiv='refresh' content='4;url=index.php?halaman=produk'>";
}
?>


<br>
<!-- awal footer -->
</div>
<div class="copyright text-center text-white font-weight-bold bg-secondary p-2 mt-5">
<p>Copyright By PT.Hidayatulloh Sejahtera <i class="far fa-copyright"></i> 2020</p>
</div
<!-- akhir footer -->
</body>
</html>