<?php session_start(); ?>
<?php include 'connection.php'; ?>
<?php 
// Dapetin id nya
$id_produk=$_GET["id"];

// query buat ambil database

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

//echo"<pre>";
//print_r($detail);
//echo"</pre>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Detail Produk</title>
        <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    </head>
    <body>

    <?php include 'menu.php'; ?>

    <section class="kontent">
            <div class="container">
                <br><br><br><br><br><br>
                <div class="row">
                    <div class="col-md-6">
                        <img src="Product_photo/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <h1><?php echo $detail["nama_produk"]; ?></h1>
                        <h3>Size : <?php echo $detail["ukuran"]; ?></h3>
                        <h3>Stock : <?php echo $detail["stok_produk"]; ?></h3>
                        <h3>Price : Rp.<?php echo number_format($detail["harga_produk"]); ?></h3>
                        <h3>Description : <?php echo $detail["deskripsi_produk"]; ?></h3>
                        <br>
        <form method="post">
            <div class="form-group">
                <div class="input-group">
                    <input type="number" min="1" class="form-control" name="jumlah">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" name="beli"> Beli </button>
                    </div>
                </div>
            </div>
        </form>
                    <?php 
                        if (isset($_POST["beli"]))
                                {
                                    //mendapat jumlah yang diinput
                                    $jumlah = $_POST["jumlah"];
                                    //masukkan di keranjang
                                    $_SESSION["cart"][$id_produk] = $jumlah;
                                    echo "<script>alert('Product already in ^_^');</script>";
                                    echo "<script>location='cart.php';</script>";
                                }
                    ?>
                    </div>
                </div>
            </div>
    </section>
    </body>
</html>