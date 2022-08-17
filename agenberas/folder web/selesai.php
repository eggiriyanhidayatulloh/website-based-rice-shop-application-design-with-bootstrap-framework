<?php  


$koneksi = new mysqli("localhost","root","","tokoberas");
if (isset($_POST['save'])) 
{

	$koneksi->query("INSERT INTO pesanan 
		(nama,
		email, 
		kecamatan,
		alamat, 
		telepon,
		pos,		
		id_produk, 
		nama_produk, 
		harga_produk, 
		jumlah, 
		subtotal)
		VALUES('$_POST[nama]',
		'$_POST[email]',
		'$_POST[kecamatan]',
		'$_POST[alamat]',
		'$_POST[telepon]',
		'$_POST[pos]',
		'$_POST[id_produk]',
		'$_POST[nama_produk]',
		'$_POST[harga_produk]',
		'$_POST[jumlah]',
		'$_POST[subtotal]')");

	//echo "<div class='alert alert-info'></div>";
    //echo "<meta http-equiv='refresh' content='10;url=index.php'>";
	echo "<script>alert('Terimakasih Atas Pesanan Anda, Silahkan Transfer ke Nomor Rekening BCA (012345678) sebesar subtotal Jumlah transaksi , Kirim bukti transfer ke Whatsapp di Kontak kami');
						window.location='index.php';</script>";
	
}
?>