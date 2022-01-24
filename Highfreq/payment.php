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


//mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//mendapat id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
//mendapat id_pelanggan yang login
$id_pelanggan_login = $_SESSION["customer"]["id_pelanggan"];

if ($id_pelanggan_login !==$id_pelanggan_beli)
{
    echo "<script>alert('Hey, Ngapain???');</script>";
    echo "<script>location='history.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <br><br>
        <h2>Order Confirmation</h2>
        <p>Kirim bukti pembayaran disini :</p>
        <div class="alert alert-info">Total yang harus dibayarkan <strong>Rp.<?php echo number_format($detpem["total_pembelian"]) ?>,-</strong></div>


        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Foto berbentuk JPG dengan maksimal 2MB</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</buton>
        </form>
    </div>

<?php
// jika ada tombol kirim
if (isset($_POST["kirim"]))
{
    //upload foto bukti terlebih dahulu
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafix = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti, "Bukti_pembayaran/$namafix");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("Y-m-d");

    //simpan pembayaran
    $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
        VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix') ");

    //update data pembelian (pending menjadi done)
    $koneksi->query("UPDATE pembelian SET status_pembelian='done' 
        WHERE id_pembelian='$idpem'");

    echo "<script>alert('Thank You!!!');</script>";
    echo "<script>location='history.php';</script>";
}
?>

</body>
</html>