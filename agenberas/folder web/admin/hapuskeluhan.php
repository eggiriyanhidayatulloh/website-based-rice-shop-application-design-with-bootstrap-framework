<?php 





$koneksi->query("DELETE FROM keluhan WHERE id_keluhan='$_GET[id]'");

echo "<script>alert('Data Berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=keluhan';</script>";
?>
