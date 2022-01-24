<?php
session_start();
//mendapat produk
$id_produk = $_GET['id'];


// jika sudah ada produk di keranjang, maka produk itu jumlahnya di +1
if(isset($_SESSION['cart'][$id_produk]))
{
    $_SESSION['cart'][$id_produk]+=1;
}

else
{
    $_SESSION['cart'][$id_produk] = 1;
}



//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

// halaman cart
echo "<script>alert('Product add to cart');</script>";
echo "<script>location='cart.php';</script>";
?>