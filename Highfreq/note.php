<?php
session_start();
include 'connection.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran
LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

//echo "<pre>";
//print_r ($detbay);
//echo "</pre>";

//jika belum ada data pembayaran
if (empty($detbay))
{
    echo "<script>alert('No payment data')</script>";
    echo "<script>location='history.php';</script>";
    exit();
}

// jika data pelanggan pembayaran tidak sesuai dengan yang login
//echo "<pre>";
//print_r ($_SESSION);
//echo "</pre>"; 
if ($_SESSION["customer"]['id_pelanggan']!==$detbay["id_pelanggan"])
{
    echo "<script>alert('Something went wrong... jk You cant do that!!')</script>";
    echo "<script>location='history.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Note</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <br><br>
        <h3>Payment Note</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><?php echo $detbay["nama"] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $detbay["bank"] ?></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><?php echo $detbay["tanggal"] ?></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>Rp.<?php echo number_format($detbay["jumlah"]) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="Bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
            </div>
        </div>
    </div>
</body>
</html>