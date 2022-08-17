<h2 align="center">Ubah Produk</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

//echo "<pre>";
//	print_r($pecah);
//echo "</pre>";
?>
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

<div class="container">
<div class="row">
<div class="col-md-7">
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Silahkan Ubah Detail yang diinginkan</h3>
	</div>
<div class="panel-body">
<form method="post" enctype="multipart/form-data">
<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori">
			<option value="">Pilih Kategori</option>
			<?php foreach($datakategori as $key => $value): ?>
			
			<option value="<?php echo $value["id_kategori"]?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]){echo "selected";} ?> >
			<?php echo $value["nama_kategori"]?>
			
			</option>
			<?php endforeach ?>
		
		</select>
	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" required value="<?php  echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga Rp</label>
		<input type="number" class="form-control" name="harga" min="0" required value="<?php echo $pecah['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Berat (Kg)</label>
		<input type="number" class="form-control" name="berat" min="0" required value="<?php echo $pecah['berat_produk']; ?>">
	</div>
	<div class="form-group">
		<label></label>stok
		<input type="number" class="form-control" name="stok" min="0" required value="<?php echo $pecah['stok_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Foto Sebelumnya</label><br>
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200px">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>

		<input type="file" name="foto" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea required name="deskripsi" class="form-control" cols="30" rows="10"><?php echo $pecah['deskripsi_produk']; ?>
		</textarea>
	</div>
	<button class="btn btn-primary fa fa-refresh" name="ubah">Ubah</button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php 
if (isset($_POST['ubah'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];;
	// jika foto dirubah
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',stok_produk='$_POST[stok]',
			foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]'
			WHERE id_produk='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',stok_produk='$_POST[stok]',
			deskripsi_produk='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]' 
			WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('Data Produk Berhasil diubah')</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>