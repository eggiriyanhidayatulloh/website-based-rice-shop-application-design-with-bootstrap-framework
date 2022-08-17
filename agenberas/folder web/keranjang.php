<?php 
session_start();

//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";

$koneksi = new mysqli("localhost","root","","tokoberas");

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Terlebih Dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Keranjang Belanja</title>

	<link rel="stylesheet" type="text/css" href="footer.css">
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
<br>
<section class="konten">
	<div class="container">
		<br><br><br>
		<h1 align="center">Keranjang Belanja</h1>
		<hr>
		<div class="row">
		<div class="col-md-7 col-md-offset-2">
				
			
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Berat</th>
					<th>Jumlah</th>
					<th>total+ongkir</th>
				
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php  $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
				 <!-- Menampilkan produk yg sedang di perulangkan berdasarkan id_produk-->
				 <?php 
				 $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				 $pecah = $ambil->fetch_assoc();
				 $subtotal = $pecah["harga_produk"]*$jumlah;
				// echo "<pre>";
				 //print_r($pecah);
				 //echo "</pre>";
				  ?>
				  
				<tr>
					
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo number_format($pecah["berat_produk"]); ?> kg</td>
					<td><?php echo $jumlah;?></td>
					<td>Rp. <?php echo number_format($subtotal+15000); ?></td>

					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>		
						<?php echo "<a href='checkout.php?id=$id_produk&jumlah=$jumlah&subtotal=$subtotal' class='btn btn-info'>checkout</a> ";?>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>

			</tbody>

		</table>
		</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
		<!--<a href="deskripsi.php?id=<?php //echo $perproduk['id_produk']; ?>" class="btn btn-default">Deskripsi Produk</a>-->
		</div>
			</div>
				</div>
				
</section>
<br><br><br><br><br><br><br><br>
<div class="copyright text-center text-white font-weight-bold bg-secondary p-2 mt-5">
<p>Copyright By PT.Hidayatulloh Sejahtera <i class="far fa-copyright"></i> 2020</p>
</div>

</body>
</html>