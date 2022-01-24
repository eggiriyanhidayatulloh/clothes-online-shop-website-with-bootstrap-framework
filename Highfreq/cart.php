<?php
session_start();


//echo "<pre>";
//print_r($_SESSION['cart']);
//echo "</pre>";

include 'connection.php';


if(empty($_SESSION["cart"]) OR !isset($_SESSION["cart"]))
{
    echo "<script>alert('Your Cart is Currently Empty!');</script>";
    echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>


<?php include 'menu.php'; ?>

<section class="konten">
    <div class="container">
        <br><br><br><br>
        <h1>Your Cart</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Subtotal</th>   
                    <th>Action</th>     
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php foreach ($_SESSION["cart"] as $id_produk => $jumlah): ?>
                
                <?php
                $ambil = $koneksi->query("SELECT * FROM produk
                    WHERE id_produk='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_produk"]*$jumlah;
                
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo  $pecah["nama_produk"]; ?></td>
                    <td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp.<?php echo number_format($subharga); ?></td>
                    <td>
                        <a href="deletecart.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">delete</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-default">Continue Shopping <i class="glyphicon glyphicon-shopping-cart" ></i></a>
        <a href="checkout.php" class="btn btn-primary">Checkout <i class="glyphicon glyphicon-qrcode" ></i></a>
    </div>
</section>



</body>
</html>

