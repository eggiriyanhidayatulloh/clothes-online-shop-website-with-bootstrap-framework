<?php
session_start();
//koneksi ke database
include 'connection.php';


//jika belum login
if (!isset($_SESSION["customer"]) OR empty($_SESSION["customer"]))
{
    echo "<script>alert('You should login first.');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Higher Frequencies</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
    <body>
        

<?php include 'menu.php'; ?>


<section class="riwayat">
    <div class="container">
    <br><br><br><br>
        <h3>Purchase History for: <?php echo $_SESSION["customer"]["nama_pelanggan"] ?></h3><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor=1;
                // mendapatkan id_pelanggan yang login
                $id_pelanggan = $_SESSION["customer"]['id_pelanggan'];

                $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                while($pecah = $ambil->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["tanggal_pembelian"] ?></td>
                    <td>
                        <?php echo $pecah["status_pembelian"] ?>
                        <br>
                        <?php if (!empty($pecah['resi_pengiriman'])): ?>
                        receipt number: <?php echo $pecah['resi_pengiriman']; ?>
                        <?php endif ?>
                    </td>
                    <td>Rp.<?php echo number_format($pecah["total_pembelian"]) ?>,-</td>
                    <td>
                        <a href="bill.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Bill <i class="glyphicon glyphicon-file" ></i></a>

                        <?php if ($pecah['status_pembelian']=="pending"): ?>
                        <a href="payment.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">
                        Input Payment <i class="glyphicon glyphicon-ok-sign" ></i>
                        </a>
                        <?php else: ?>
                        <a href="note.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning">
                            Note
                        </a>
                        <?php endif ?>
                        
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

</body>
</html>