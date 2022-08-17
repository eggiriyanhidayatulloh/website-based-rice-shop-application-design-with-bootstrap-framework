<?php 
session_start();

$koneksi = new mysqli("localhost","root","","tokoberas");
$ambil=$koneksi->query("SELECT * FROM pelanggan");
$pecah=$ambil->fetch_assoc();


// jika tidak ada session pelanggan(blm login) maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Silahkan Login Terlebih Dahulu')</script>";
	echo "<script>location='login.php';</script>";
	exit();
}


if (!isset($_SESSION["keranjang"]))
	{
		echo "<script>alert('Silahkan Pilih Produk yang akan dibeli terlebih dahulu')</script>";
		echo "<script>location='index.php';</script>";
		exit();
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Checkout</title>

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

<?php 
 				 $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
				 $pecah = $ambil->fetch_assoc();
				 $id_produk=$pecah['id_produk'];
				 $nama_produk=$pecah['nama_produk'];
				 $harga_produk=$pecah['harga_produk'];
				 $berat_produk=$pecah['berat_produk'];
				 $jumlah=$_GET['jumlah'];
				 $subtotal=$_GET['subtotal'];

				 $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk ='$id_produk'");
				// echo "<pre>";
				 //print_r($pecah);
				 //echo "</pre>";
				  ?>


<br><br>
<br><br>
<div class="container">
<div class="row">
<div class="col-md-12 col-md-offset-4">
<div class="panel-heading text-center ">
			<h3 class="panel-title align=center ">Checkout Produk</h3>
	</div>
<div class="col-md-5 col-md-offset-4">
<div class="panel panel-info">
	
	<div class="panel-body">
 <form method="post" enctype="multipart/form-data" action="selesai.php">
 	
	<div class="form-group ">
		<label>ID Produk</label>
		<input type="text" class="form-control" name="id_produk" readonly value="<?php echo $id_produk ?>">
	</div>
<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama_produk" readonly value="<?php echo $nama_produk ?>">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="text" class="form-control" name="harga_produk" readonly value="<?php echo $harga_produk ?>">
	</div>
	<div class="form-group">
		<label>Berat(kg)</label>
		<input type="text" class="form-control" name="berat_produk" readonly value="<?php echo $berat_produk ?>">
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="text" class="form-control" name="jumlah" readonly value="<?php echo $jumlah ?>">
	</div>
	<div class="form-group">
		<label>total+ongkir Rp.15.000</label>
		<input type="text" class="form-control" name="subtotal" readonly value="<?php echo $subtotal+15000 ?>">
	</div>


 		<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label>Email Pelanggan</label>
		<input type="email" class="form-control" name="email" required>
	</div>
	<div class="form-group">
		<label>*( Biaya Pengiriman  diatas hanya khusus untuk daerah sekitar kota Bekasi , apabila diluar kota bekasi silahkan hubungi Whatssapp di Kontak kami)
		</label>
		<label>Kecamatan</label>
		<select name="kecamatan" class="form-control" required> 
			<option>Bantar Gebang</option>
			<option>Bekasi Barat</option>
			<option>Bekasi Selatan</option>
			<option>Bekasi timur</option>
			<option>Bekasi Utara</option>
			<option>Jatiasih</option>
			<option>Jatisampurna</option>
			<option>Medan Satria</option>
			<option>Mustika Jaya</option>
			<option>Pondok Gede</option>
			<option>Pondok Melati</option>
			<option>Rawalumbu</option>
			<option>Diluar kota bekasi</option>
		</select>
	</div>
	<div class="form-group">
		<label>Alamat Lengkap</label>
		<input type="text" class="form-control" name="alamat" required>
	</div>
	<div class="form-group">
		<label>No Telepon</label>
		<input type="text" class="form-control" name="telepon" required>
	</div>
	<div class="form-group">
		<label>Kode Pos</label>
		<input type="text" class="form-control" name="pos" required>

	</div>
	<button type="submit" name="save" class="btn btn-info">Lanjutkan Belanja</button>
</form>
</div>
</div>
</div>
</div>
</div>
<br>

</div>
<div class="copyright text-center text-white font-weight-bold bg-secondary p-2 mt-5">
<p>Copyright By PT.Hidayatulloh Sejahtera <i class="far fa-copyright"></i> 2020</p>
</div>

</body>
</html>