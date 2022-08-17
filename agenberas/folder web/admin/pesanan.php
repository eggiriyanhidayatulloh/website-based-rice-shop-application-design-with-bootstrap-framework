<h2 style="text-align: center;">Data Pesanan</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Kecamatan</th>
			<th>Alamat</th> 
			<th>Telepon</th>
			<th>Kode Pos</th>
			<th>ID Produk</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Jumlah Beli</th>
			<th>Subtotal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM pesanan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['kecamatan']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
			<td><?php echo $pecah['telepon']; ?></td>
			<td><?php echo $pecah['pos']; ?></td>
			<td><?php echo $pecah['id_produk']; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subtotal']; ?></td>
						<td>
				<a href="index.php?halaman=hapuspesanan&id=<?php echo $pecah['id_pesanan']; ?>" class="btn-danger btn">Hapus</a>

			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
