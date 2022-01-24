<?php 
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk = $ambil->fetch_assoc();



$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while($tiap = $ambilfoto->fetch_assoc())
{
    $fotoproduk[] = $tiap;
}



//echo "<pre>";
//print_r ($fotoproduk);
//echo "</pre>";

?>

<table class="table">
    <tr>
        <th>Kategori</th>
        <td><?php echo $detailproduk["nama_kategori"]; ?></td>
    </tr>
    <tr>
        <th>Produk</th>
        <td><?php echo $detailproduk["nama_produk"]; ?></td>
    </tr>
    <tr>
        <th>Harga</th>
        <td><?php echo $detailproduk["harga_produk"]; ?></td>
    </tr>
    <tr>
        <th>Ukuran</th>
        <td><?php echo $detailproduk["ukuran"]; ?></td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td><?php echo $detailproduk["deskripsi_produk"]; ?></td>
    </tr>
</table>


<div class="row">
    <?php foreach ($fotoproduk as $key => $value): ?>

    <div class="col-md-3 text-center">
        <img src="../Product_photo/<?php echo $value["nama_produk_foto"] ?>" alt="" class="img-responsive"><br>
        <a href="index.php?halaman=deletephoto&idfoto=<?php echo $value["id_produk_foto"] ?>&idproduk=<?php echo $id_produk ?>"
        class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash" ></i> delete</a>
    </div>
    <?php endforeach ?>
</div>


<hr>


<?php 
if (isset($_POST["simpan"]))
{
    $lokasifoto = $_FILES["fotos"]["tmp_name"];
    $namafoto = $_FILES["fotos"]["name"];


    $namafoto = date("YmdHis").$namafoto;

    //upload
    move_uploaded_file($lokasifoto, "../Product_photo/".$namafoto);

    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('$id_produk','$namafoto') ");

    echo "<script>alert('Product photo saved');</script>";
    echo "<script>location='index.php?halaman=detailproduct&id=$id_produk';</script>";
}
?>