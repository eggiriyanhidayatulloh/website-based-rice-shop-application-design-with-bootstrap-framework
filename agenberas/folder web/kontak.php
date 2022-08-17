<?php 
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","tokoberas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">s
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
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Kontak Kami" href="#HUBUNGI KAMI">Kontak kami</a>
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
	<h1 class="text-center">Kontak kami</h1><br>
	<div class="text-center">
	<p>Jika ingin membeli secara offline bisa hubungi whatsapp dan sosial media kami atau bisa datangi alamat toko kami</p>
	</div>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-info">
<br><br>
	<div class="panel-heading">
		<h3 class="panel-title">Sosail media</h3>
	</div>
	<br>
	<h3><i class="fab fa-instagram"></i>  @Agenberastani96</h3>
	<br>
	<h3><i class="fab fa-facebook-square"></i>  Official Agenberastani</h3>
    <br>
    <h3><i class="fab fa-whatsapp"></i></i>  0895339729517</h3>
    <br>
        
    <h3 class="panel-title">Alamat</h3>
		<br>
		<h3 class="panel-title">HO1 65 Ruko Taman Puspa,Tanah Apit Jl. Pusaka Rakyat, Kec. Tarumajaya, Bekasi, Jawa Barat 17214
        </h3>
        <br>			
            <h3 class="text-center font-wight-bold">LOCATION</h3>
            <br>
			<div class="embed-responsive embed-responsive-21by9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.6785952869608!2d106.97701900635033!3d-6.169009294209525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x913f97498120155d!2sAgen%20beras%20tani!5e0!3m2!1sid!2sid!4v1599589929576!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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