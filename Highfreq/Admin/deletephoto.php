<?php 

$id_foto = $_GET["idfoto"];
$id_produk = $_GET["idproduk"];


//ambil dulu datanya
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk_foto='$id_foto'");
$detailfoto = $ambilfoto->fetch_assoc();

$namafilefoto = $detailfoto["nama_produk_foto"];
//hapus foto di folder
unlink("../Product_photo/".$namafilefoto);



//menghapus foto di mysql
$koneksi->query("DELETE FROM produk_foto WHERE id_produk_foto='$id_foto'");

echo "<script>alert('Product photo deleted');</script>";
echo "<script>location='index.php?halaman=detailproduct&id=$id_produk';</script>";


?>