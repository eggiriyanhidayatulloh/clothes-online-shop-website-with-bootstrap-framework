<?php include 'connection.php'; ?>
<?php 
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
    OR deskripsi_produk LIKE '%$keyword'");
while($pecah = $ambil->fetch_assoc())
{
    $semuadata[]=$pecah;
}

//echo "<pre>";
//print_r ($semuadata);
//echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>
    <div class="container">
        <h3>Search Result : <?php echo $keyword ?></h3>

        <?php if (empty($semuadata)): ?>
            <div class="alert alert-danger">Your result: <strong><?php echo $keyword ?></strong> does not match any result!</div>
            <?php endif ?>

        <div class="row">

            <?php foreach ($semuadata as $key => $value): ?>


            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="Product_photo/<?php echo $value["foto_produk"] ?>" alt="" class="img-responsive">
                    <div class="caption">
                        <h3><?php echo $value["nama_produk"] ?></h3>
                        <h5>Rp.<?php echo number_format($value['harga_produk']) ?></h5>
                        <a href="buy.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-primary">Buy</a>
                        <a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-default">Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>


        </div>
    </div>

</body>
</html>