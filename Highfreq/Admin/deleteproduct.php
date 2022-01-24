<?php

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../Product_photo/$fotoproduk")) 
{
    unlink("../Product_photo/$fotoproduk");
}


$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('Product deleted');</script>";
echo "<script>location='index.php?halaman=produk';</script>";




?>