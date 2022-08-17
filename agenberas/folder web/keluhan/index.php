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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">                   
                    <a class="nav-link js-scroll-trigger " data-toggle="tooltip" title="Home" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Keranjang" href="keranjang.php">Keranjang</a>
            </li>
            
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Sosial Media" href="checkout.php">Checkout</a>
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
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Login" href="logout.php">Logout</a>
            </li>
            <!-- selain itu(blm login/belum ada session_pelanggan) -->
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Kontak Kami" href="login1.php">login</a>
            </li>
            <?php endif ?>
            <li>
                <i class="fa-1x fas fa-user text-white mt-3 ml-1"></i>
            </i>
                </ul>
        </div>
    </nav>
    <div class="row mt-5 no-gutters">
        <div class="col-md-2 bg-light">
        <ul class="list-group list-group-flush p-2 pt-4">
            <li class="list-group-item bg-warning"><i class="fas fa-list"></i>   KATEGORI PRODUK</li>
            <li class="list-group-item list-group-item-action list-group-item-dark"><i class="fas fa-angle-right"></i>  BERAS MERAH</li>
            <li class="list-group-item list-group-item-action list-group-item-dark"><i class="fas fa-angle-right"></i>  BERAS PANDAN WANGI</li>
            <li class="list-group-item list-group-item-action list-group-item-dark"><i class="fas fa-angle-right"></i>  BERAS KETAN</li>
            <li class="list-group-item list-group-item-action list-group-item-dark"><i class="fas fa-angle-right"></i>  BERAS PULEN</li>
        </ul>
        </div>
        <div class="col-md-10">
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
            <h1 class="display-4"><span class="font-weight-bold">FIND YOUR DREAM HOUSE HERE</span></h1>
                <p class="lead">Temukan Rumah Idaman Yang Murah dan Berkualitas Hanya Di RumahImpian.com</p>
                    <p class="lead">Dapatkan Rumah Idaman Sesuai Keinginan dan Mimpimu</p>
                        <hr class ="my-4">
        </div>
        </div>
            <div class="carousel-item">
                <img src="img/eggi.jpg" class="d-block w-100" alt="...">
            </div>
        <div class="carousel-item">
            <img src="img/padi3.jpg" class="d-block w-100" alt="...">
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
        <h4 class="text-center font-weight-bold">CONTOH PRODUK</h4>
            <div class="row mx-auto">
                    <div class="card mr-2 ml-2" style="width: 16rem;">
                        <img src="img/brs.jpg" class="card-img-top" alt="...">
                        <div class="card-body bg-light">
                        <h5 class="card-title">BERAS PULES</h5>
                        <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                        <h2 class="card-text text-red">Rp 60.000</h2>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-warning"></i><br>
                            <a href="#" class="btn btn-primary mt-2" data-target="#produk1" data-toggle="modal">Detail</a>
                        </div>
                    </div>
                    <div class="card mr-2 ml-2" style="width: 16rem;">
                        <img src="img/brs.jpg" class="card-img-top" alt="...">
                        <div class="card-body bg-light">
                        <h5 class="card-title">BERAS PULES</h5>
                        <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                        <h2 class="card-text text-red">Rp 60.000</h2>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-warning"></i><br>
                            <a href="#" class="btn btn-primary mt-2">Detail</a>
                        </div>
                    </div>
                    <div class="card mr-2 ml-2" style="width: 16rem;">
                        <img src="img/brs.jpg" class="card-img-top" alt="...">
                        <div class="card-body bg-light">
                        <h5 class="card-title">BERAS PULES</h5>
                        <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                        <h2 class="card-text text-red">Rp 60.000</h2>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-warning"></i><br>
                            <a href="#" class="btn btn-primary mt-2">Detail</a>
                        </div>
                    </div>
                    <div class="card mr-2 ml-2" style="width: 16rem;">
                        <img src="img/brs.jpg" class="card-img-top" alt="...">
                        <div class="card-body bg-light">
                        <h5 class="card-title">BERAS PULES</h5>
                        <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                        <h2 class="card-text text-red">Rp 60.000</h2>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-warning"></i><br>
                            <a href="#" class="btn btn-primary mt-2">Detail</a>
                        </div>
                    </div>
            </div>
            <div class="row mx-auto mt-5">
                <div class="card mr-2 ml-2 " style="width: 16rem;">
                    <img src="img/brs.jpg" class="card-img-top" alt="...">
                    <div class="card-body bg-light">
                    <h5 class="card-title">BERAS PULES</h5>
                    <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                    <h2 class="card-text text-red">Rp 60.000</h2>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>
                        <i class="far fa-star text-warning"></i><br>
                        <a href="#" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="card mr-2 ml-2" style="width: 16rem;">
                    <img src="img/brs.jpg" class="card-img-top" alt="...">
                    <div class="card-body bg-light">
                    <h5 class="card-title">BERAS PULES</h5>
                    <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                    <h2 class="card-text text-red">Rp 60.000</h2>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>
                        <i class="far fa-star text-warning"></i><br>
                        <a href="#" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="card mr-2 ml-2" style="width: 16rem;">
                    <img src="img/brs.jpg" class="card-img-top" alt="...">
                    <div class="card-body bg-light">
                    <h5 class="card-title">BERAS PULES</h5>
                    <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                    <h2 class="card-text text-red">Rp 60.000</h2>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>
                        <i class="far fa-star text-warning"></i><br>
                        <a href="#" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="card mr-2 ml-2" style="width: 16rem;">
                    <img src="img/brs.jpg" class="card-img-top" alt="...">
                    <div class="card-body bg-light">
                    <h5 class="card-title">BERAS PULES</h5>
                    <p class="card-text">Beras Pulen Asli tanpa oplosan beras lainnya</p>
                    <h2 class="card-text text-red">Rp 60.000</h2>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>
                        <i class="far fa-star text-warning"></i><br>
                        <a href="#" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
        </div>
    </div>
</div>
                <!-- Modal -->
        <div class="modal fade" id="produk1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/brs1.jpg">
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                                <tr>
                                    <th>Nama produk</th>
                                    <td>Beras Pulen</td>
                                </tr>
                                <tr>
                                    <th>Merek</th>
                                    <td>Rojo lele</td>
                                </tr>
                                <tr>
                                    <th>Biaya ongkir</th>
                                    <td>5kg</td>
                                </tr>
                                <tr>
                                    <th>Rating Produk</th>
                                    <td>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                        <i class="far fa-star text-warning"></i><br>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>10pcs</td>
                                </tr>
                                    <tr>
                                    <th>Harga</th>
                                    <td>Rp 60.000</td>
                                </tr>
                        </table>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">kembali</button>
                <button type="button" class="btn btn-primary">Beli</button>
                </div>
            </div>
            </div>
        </div>
                    <footer class="bg-dark text-white p-5 mt-3"> 
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Layanan Pelanggan</h5>
                                <ul>
                                    <li>Pusat bantuan</li>
                                    <li>Car Pembnelian</li>
                                    
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Tentang kami</h5>
                                <ul>
                                    <li>Lokasi kami</li>
                                    <li>bagaimana kami</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Cara beli</h5>
                                <ul>
                                    <li>Gojek</li>
                                    <li>Grab</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Kontak kami</h5>
                                <ul>
                                    <li>Nomer WA</li>
                                    <li>Sosial Media</li>
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