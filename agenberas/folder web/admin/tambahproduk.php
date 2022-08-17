<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc())
{
	$datakategori[] = $tiap;
}

//echo"<pre>";
//print_r($datakategori);
//echo"</pre>";

?>

<h2 align="center">Tambah Produk</h2>

<div class="container">
<div class="row">
<div class="col-md-7">
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Silahkan Tambahkan Produk</h3>
	</div>
<div class="panel-body">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori" required>
			<option value="">Pilih Kategori</option>
			<?php foreach($datakategori as $key => $value): ?>
			
			<option value="<?php echo $value["id_kategori"]?>"><?php echo $value["nama_kategori"]?></option>
			<?php endforeach ?>
		
		</select>

	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" required>
	</div>
	<div class="form-group">
		<label>Berat (Kg)</label>
		<input type="number" class="form-control" name="berat" required>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok" required>
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10" required></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto" required>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
</div>
</div>
</div>
</div>
</div>


<?php  
if (isset($_POST['save'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi,"../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk 
		(nama_produk,harga_produk,berat_produk,stok,foto_produk,deskripsi_produk,id_kategori)
		VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[stok]','$nama','$_POST[deskripsi]','$_POST[id_kategori]')");

	echo "<script>alert('Data telah tersimpan')</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
	//echo "<div class='alert alert-info'>Data telah tersimpan</div>";
	//echo "<meta http-equiv='refresh' content='4;url=index.php?halaman=produk'>";
}
?>
