<h2 style="text-align: center;">Data Pelanggan</h2>
<table class="table table-bordered col-md-5">
	<thead>
		<tr>
			<th>No</th>
			<th>Id Pelanggan</th>
			<th>Email</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan");  ?>
		<?php while($pecah=$ambil->fetch_assoc()){  ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-danger">Hapus</a>
			</td>
			
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>