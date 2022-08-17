<?php 
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
    <div class="row mt-5 no-gutters">

        <div class="col-md-12">
    <!--<div class="jumbotron">
        <div class="container">
            <h1 class="display-4"><span class="font-weight-bold">FIND YOUR DREAM HOUSE HERE</span></h1>
        <p class="lead">Temukan Rumah Idaman Yang Murah dan Berkualitas Hanya Di RumahImpian.com</p>
        <p class="lead">Dapatkan Rumah Idaman Sesuai Keinginan dan Mimpimu</p>
        <hr class ="my-4">
        <a class="btn btn-primary btn-lg font-weight-bold" href="CARI" role="button">CARI</a>
        </div>
    </div> -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/padi.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="display-4"><span class="font-weight-bold">SELAMAT DATANG DI WEBSITE AGEN BERASTANI</span></h1>
                <p class="lead">Beras berkualitas tanpa pemutih, pengawet dan pewangi buatan hanya di AGENBERASTANI</p>
                    <p class="lead">Kualitas dan Kesenangan Pelanggan adalah prioritas kami</p>
                        <hr class ="my-4">
        </div>
        </div>
            <div class="carousel-item">
                <img src="img/sawah.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
            <h1 class="display-4"><span class="font-weight-bold">AGEN BERASTANI</span></h1>
                <p class="lead">Berdiri sejak tahun 2019 yang berlokasi di Harapan Indah Bekasi Utara. Agen Berastani didirikan oleh Ibu Catimah dan sudah memiliki dua cabang yang berlokasi di Narogong dan Harapan Indah. Produk yang dijual merupakan produk Beras asli dari kota karawang Jawa Barat. Pada Website ini kami menjual berbagai jenis beras seperti beras merah, beras hitam, beras ketan, beras putih.  </p>
                        <hr class ="my-4">
        </div>
            </div>
        <div class="carousel-item">
            <img src="img/padi3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4"><span class="font-weight-bold">AGEN BERASTANI</span></h1>
                        <p class="lead">Kami menjual Beras berkualitas yang kami olah sendiri tanpa menggunakan pemutih, pewangi dan juga pengawet buatan. Oleh karena itu produk yang kami jual dijamin kesehatan nya dan kehalalan nya. "Melayani dengan sepenuh hati dan menjaga kualitas produk yang kami jual" itulah moto kami.</p>
                                <hr class ="my-4">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
</div>
                <!-- Modal -->
                    <footer class="bg-dark text-white p-5 "> 
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