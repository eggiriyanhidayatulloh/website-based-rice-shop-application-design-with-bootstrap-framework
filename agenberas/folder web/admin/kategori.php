<h3>Data Kategori</h3>
<hr>

<?php
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc())
{
    $semuadata[] = $tiap;
}
// echo"<pre>";
// print_r ($tiap);
// echo "</pre>";

?>

<table class="table table-bordered text-center">
        <thead>
            <tr>
                <td>ID</td>
                <td>KATEGORI</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semuadata as $key => $value):  ?>


            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value["nama_kategori"] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
</table>