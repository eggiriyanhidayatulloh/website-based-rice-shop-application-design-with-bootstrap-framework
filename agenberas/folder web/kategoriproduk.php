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
                <a class="nav-link js-scroll-trigger  " data-toggle="tooltip" title="Kategori prosuk" href="kategoriproduk.php">Kategori Produk</a>
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
                    <li class="list-group-item bg-dark text-white"><i class="fas fa-list mr-2"></i> Kategori produk</li>
                        <?php
                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                if (mysqli_num_rows($kategori) > 0){
                                    while($k = mysqli_fetch_array($kategori)){
                        ?>
                            <a href="kategoriproduk2.php?kat=<?php echo $k['id_kategori']?>" name="kat" method="get">
                    <li  href="kategoriproduk2.php" class="list-group-item list-group-item-action list-group-item-secondary "> <i class="fas fa-angle-right" > </i> <?php echo $k['nama_kategori']  ?></li>
                            </a>
                    <?php }}else{?>
                        <P>Kategori Tidak Ada</P>
                    <?php } ?>
                </ul>
            </div>
        <div class="col-md-9 mt-5 ">
        <h4 class="text-center font-weight-bold"></i></h4>
            <div class="row mx-auto">
			<div  class="card mr-2 ml-3 mt-5" style="width: 14rem;">
				<div class="thumbnail">  
					<img  src="foto_produk/brshtm.jpeg" class="card-img-top" alt="">
                    <div  class="caption" > 
                        <br><br>
                        <center><a href="#" name="brshtm" data-target="#berashitam" data-toggle="modal">BERAS HITAM</a></center>
                        <!-- <a href="deskripsi.php?id=<?php//echo $perproduk['id_produk']; ?>" class="btn btn-primary text-center">Deskripsi</a> -->
                        <br><br>
                    </div>
				</div>
			</div>
            <div  class="card mr-2 ml-3 mt-5" style="width: 14rem;">
				<div class="thumbnail">  
					<img  src="foto_produk/brsmrh.jpeg" class="card-img-top" alt="">
                    <div  class="caption" > 
                        <br><br>
                        <center><a href="#" name="brsmrh" data-target="#berasmerah" data-toggle="modal">BERAS MERAH</a></center>
                        <!-- <a href="deskripsi.php?id=<?php//echo $perproduk['id_produk']; ?>" class="btn btn-primary text-center">Deskripsi</a> -->
                        <br><br>
                    </div>
				</div>
			</div> 
            <div  class="card mr-2 ml-3 mt-5" style="width: 14rem;">
				<div class="thumbnail">  
					<img  src="foto_produk/brsktn.jpeg" class="card-img-top" alt="">
                    <div  class="caption" > 
                        <br><br>
                        <center><a href="#" name="brsktn" data-target="#berasketan" data-toggle="modal" >BERAS KETAN</a></center>
                        <!-- <a href="deskripsi.php?id=<?php//echo $perproduk['id_produk']; ?>" class="btn btn-primary text-center">Deskripsi</a> -->
                        <br><br>
                    </div>
				</div>
			</div>
            <div  class="card mr-2 ml-3 mt-5" style="width: 14rem;">
				<div class="thumbnail">  
					<img  src="foto_produk/brspth1.jpeg" class="card-img-top" alt="">
                    <div  class="caption" > 
                        <br><br>
                        <center><a href="#" name="brspth" data-target="#berasputih" data-toggle="modal">BERAS PUTIH</a></center>
                        <!-- <a href="deskripsi.php?id=<?php//echo $perproduk['id_produk']; ?>" class="btn btn-primary text-center">Deskripsi</a> -->
                        <br><br>
                    </div>
				</div>
			</div>
            <div class="modal fade" id="berashitam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">BERAS HITAM</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kandungan Gizi</th>
                                    <td>Protein,Zat besi,Karbohidrat,lemak,Vit E, B1, B2 dan B9</td>
                                </tr>
                                <tr>
                                    <th>Manfaat</th>
                                    <td>Dapat mengurangi resiko kanker, memperkuat imunitas tubuh, menurunkan berat badan, dsb.</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>Beras hitam adalah beras berbiji dengan corak ungu tua dan rasa pedas yang agak manis. Beras gandum ini kaya akan antosianin, yang merupakan pigmen antioksidan yang memberi warna yang tidak biasa pada nasi.</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="modal fade" id="berasmerah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">BERAS MERAH</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kandungan Gizi</th>
                                    <td>Karbohidrat,Protein,Sedikit kalori,Mineral,lemak,Vit B6.</td>
                                </tr>
                                <tr>
                                    <th>Manfaat</th>
                                    <td>Mengontrol berat badan,Mengontrol kadar gula darah,Melancarkan pencernaan dan mengurangi resiko kanker</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>Beras merah merupakan biji-bijian utuh yang hanya mengalami proses pengupasan kulit atau sekam. Beras merah dinilai lebih unggul dari beras putih karena proses pengolahannya lebih singkat, sehingga kandungan nutrisinya tidak banyak terbuang</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="modal fade" id="berasketan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">BERAS KETAN</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kandungan Gizi</th>
                                    <td>Karbohidrat,lemak,Protein,Gula,Kalsium,Fosfor</td>
                                </tr>
                                <tr>
                                    <th>Manfaat</th>
                                    <td>Mencegah diabetes,Mencegah peradangan,Meningkatkan kesehatan jantung, Meningkatkan kepadatan tulang.</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>Beras ketan putih (Oryza sativa glutinosa) merupakan salah satu varietas padi yang termasuk dalam famili Graminae. Butir beras sebagian besar terdiri dari zat pati sekitar 80-85% yang terdapat dalam endosperma yang tersusun oleh granula-granula pati yang berukuran 3-10 milimikron.</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="modal fade" id="berasputih" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">BERAS PUTIH</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kandungan Gizi</th>
                                    <td>Karbohidrat,lemak,Sodium,Gula,Serat</td>
                                </tr>
                                <tr>
                                    <th>Manfaat</th>
                                    <td>Baik untuk kesehatan usus,Sumber energi yang baik untuk tubuh,Bantu menjaga kesehatan tulang dan otot</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>Beras putih adalah makanan pokok orang Indonesia, sehingga banyak orang bilang, belum makan kalau belum makan nasi. Mengonsumsi nasi putih, selama tidak berlebihan akan memberikan berbagai manfaat untuk tubuh. Sebab, selain kandungan karbohidratnya yang tinggi, nasi juga memiliki protein dan kalori yang baik sebagai sumber energi.</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
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