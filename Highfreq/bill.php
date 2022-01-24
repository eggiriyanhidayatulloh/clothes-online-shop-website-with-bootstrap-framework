<?php 
session_start();
include 'connection.php'; ?>


<!DOCTYPE html>
<html>
    <head>
        <title>BILL</title>
        <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
    <div class="container">
    <br><br><br><br>
    
    

    <h2>Detail Checkout</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>





<?php 
// mendapatkan id_pelanggan yang beli
$idpelangganyangbeli = $detail["id_pelanggan"];

// mendapatkan id_pelanggan yang login
$idpelangganyanglogin = $_SESSION["customer"]["id_pelanggan"];

if ($idpelangganyangbeli!==$idpelangganyanglogin)
{
    echo "<script>alert('Hayooo Ngapain???');</script>";
    echo "<script>location='history.php';</script>";
    exit();
}
?>


<div class="row">
        <div class="col-md-4">
            <h3>Purchase</h3>
            <strong>No. PEMBELIAN : <?php echo $detail['id_pembelian'] ?></strong><br>
            Date: <?php echo date("d F Y",strtotime($detail['tanggal_pembelian'])); ?><br>
            Total: Rp.<?php echo number_format($detail['total_pembelian']) ?>,-
        </div>
        <div class="col-md-4">
            <h3>Customer</h3>
            <strong>NAMA : <?php echo $detail['nama_pelanggan']; ?></strong>
            <p>
            Phone(WA): <?php echo $detail['no_pelanggan']; ?> <br>
            E-mail: <?php echo $detail['email_pelanggan']; ?>
            </p>
        </div>
        <div class="col-md-4">
            <h3>Shipment</h3>
            <strong>ALAMAT : <?php echo $detail['nama_kota'] ?></strong><br>
            Shipping charge: Rp.<?php echo number_format($detail['tarif']); ?>,- <br>
            Detail Address: <?php echo $detail['alamat_pengiriman'] ?>
        </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Size</th>
            <th>Total</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td>Rp.<?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['ukuran']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>Rp.<?php echo number_format($pecah['subharga']) ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>


<div class="row">
    <div class="co-md-7">
        <div class="alert alert-info">
            <p>
                Silahkan Lakukan Pembayaran Rp.<?php echo number_format($detail['total_pembelian']); ?>,-  ke <br>
                <strong>BANK MANDIRI 137-00108-3276 AN. Eduard Sebastian</strong>
            </p>
        </div>
    </div>
</div>


    </div>
</section>

</body>
</html>