<?php 





$koneksi->query("DELETE FROM pesanan WHERE id_pesanan='$_GET[id]'");

echo "<script>alert('Data Berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=pesanan';</script>";
?>
