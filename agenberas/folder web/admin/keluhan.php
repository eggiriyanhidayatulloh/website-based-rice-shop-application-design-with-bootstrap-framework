<?php 
$koneksi = new mysqli("localhost","root","","tokoberas");
 ?>

<h2 align="center">Keluhan Pelanggan</h2>
<table class="table table-bordered col-md-5">
	<thead>
		<tr>
			<th>No</th>
			<th>Id Keluhan</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Pesan</th>
			<th>Foto Pendukung</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM keluhan");  ?>
		<?php while($pecah=$ambil->fetch_assoc()){  ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_keluhan']; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['telepon']; ?></td>
			<td><?php echo $pecah['pesan']; ?></td>
			<td>
			<img src="../keluhan/<?php echo $pecah['foto']; ?>" width="100"></td>
			
			<!-- <img src="../foto_produk/<?php //echo $pecah['foto_produk']; ?>" width="100"> -->
			<td>
				<a href="index.php?halaman=hapuskeluhan&id=<?php echo $pecah['id_keluhan']; ?>" class="btn-danger btn fa fa-pencil">Hapus</a>
			</td>
			
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
