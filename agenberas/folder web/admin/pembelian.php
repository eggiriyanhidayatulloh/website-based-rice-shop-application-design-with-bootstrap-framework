<h2 style="text-align: center;">Data Pembelian</h2>
<table class="table table-bordered">
	<thead>
		<tbody>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal</th>
				<th>Total</th>
				<th>Aksi</th>
			</tr>
			<tr>
				<?php $nomor=1; ?>
				<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
				<?php while($pecah=$ambil->fetch_assoc()){ ?>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_pelanggan']; ?></td>
				<td><?php echo $pecah['tanggal_pembelian']; ?></td>
				<td><?php echo $pecah['total_pembelian']; ?></td>
				<td>
					<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Detail</a>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</thead>
</table>