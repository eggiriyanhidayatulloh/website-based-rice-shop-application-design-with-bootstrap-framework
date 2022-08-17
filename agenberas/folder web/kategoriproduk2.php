<?php   
error_reporting(0);
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","tokoberas");
?>
<!doctype html>
<html lang="en">
        <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <title>AGEN BERASTANI</title>
</head>
<bodyid="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top "id="mainNav">
        <div class="container">
            <h3><i class="fas fa-shopping-cart text-white mr-3"></i></h3>
        <a class="navbar-brand  font-weight-bold" href="#page-top">AGEN BERASTANI</a>
        <button class="navbar-toggler navbar-toggler-right " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">                   
                    <a class="nav-link js-scroll-trigger " data-toggle="tooltip" title="Home" href="index.php">Beranda</a>
                    </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Kategori Produk" href="kategoriproduk.php">Kategori Produk</a>
            </li>
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
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="login" href="login.php">Masuk</a>
            </li>
            <?php endif ?>
                </ul>
        </div>
    </nav>
        <div class="row">
            <div class="col-md-3 bg-light">
                <ul class="list-group-flush p-1 pt-1">
                    <br><br><br><br>
                    <li class="list-group-item bg-dark text-white"><i class="fas fa-list mr-2"></i> Kategori Produk</li>
                        <?php
                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                if (mysqli_num_rows($kategori) > 0){
                                    while($k = mysqli_fetch_array($kategori)){
                        ?>
                            <a href="kategoriproduk2.php?kat=<?php echo $k['id_kategori']?>" name="kat" method="get">
                    <li href="kategoriproduk2.php" class="list-group-item list-group-item-action list-group-item-secondary "> <i class="fas fa-angle-right" ></i> <?php echo $k['nama_kategori']  ?></li>
                            </a>
                    <?php }}else{?>
                        <P>Kategori Tidak Ada</P>
                    <?php } ?>
                </ul>
            </div>
            <?php
$kat = $_GET["kat"];
$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori LIKE '%$kat%'");
while ($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
?>
        <div class="col-md-5 mt-5 ">
        <h4 class="text-center font-weight-bold"></i></h4>
            <div class="row mx-auto">
            <?php foreach ($semuadata as $key => $perproduk) : ?>
			<div  class="card mr-2 ml-3 mt-5" style="width: 14rem;">
				<div class="thumbnail">  
					<img  src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="">
                    <div  class="caption" > 
                        <h5 class="card-title ml-2"><?php echo $perproduk['nama_produk']; ?></h5>
                        <p class="card-text ml-2">Deskripsi : <?php echo $perproduk['deskripsi_produk']; ?></p>
                        <h6 class="card-text text-red ml-2">Stok : <?php echo $perproduk['stok_produk']; ?></h6>
                        <h6 class="card-text text-red ml-2"><?php echo $perproduk['berat_produk']; ?>Kg</h6>
						<h5 class="card-text text-red ml-2">Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                        <!-- <a href="deskripsi.php?id=<?php//echo $perproduk['id_produk']; ?>" class="btn btn-primary text-center">Deskripsi</a> -->
                        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary text-center ml-2 mt-2 ">Beli</a>
                        <br><br>
                    </div>
				</div>
			</div>
            <?php endforeach ?> 
        </div>
    </div>
</div>
                <!-- Modal -->
                    <footer class="bg-dark text-white p-5 mt-3"> 
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Layanan Pelanggan</h5>
                                <ul>
                                    <li>Pusat bantuan</li>
                                    <li>Cara Pembelian</li>
                                    <li>Pembelian Offline</li>
                                    <li>Pelanggan</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Tentang kami</h5>
                                <ul>
                                    <li>Lokasi kami</li>
                                    <li>sosial media kami</li>
                                    <li>Distributor</li>
                                    <li>Promo Produk</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Jasa Pengantar</h5>
                                <ul>
                                    <li>Gojek</li>
                                    <li>Grab</li>
                                    <li>J&T</li>
                                    <li>JNE</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Kontak kami</h5>
                                <ul>
                                    <li>Whatsapp 0895339729517</li>
                                    <li>IG @Agenberastani</li>
                                    <li>FB Official Agenberastani</li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                                    <div class="copyright text-center text-white font-weight-bold bg-secondary p-2">
                                        <p>Copyright By PT.Hidayatulloh Sejahtera <i class="far fa-copyright"></i> 2020</p>
                                    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </bodyid="page-top">
</html>