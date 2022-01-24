<?php
session_start();
include 'connection.php';


// jika tidak ada session (belum login), dilarikan ke login.php
if (!isset($_SESSION["customer"]))
{
    echo "<script>alert('oopsie! You Should Login First!');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
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
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
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

                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                    <tr>
                        <th colspan="4">Estimated Total</th>
                        <th>Rp.<?php echo number_format($totalbelanja) ?></th>
                    </tr>
            </tfoot>
        </table>


        <form method="post">
                    
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["customer"]['nama_pelanggan']?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["customer"]['no_pelanggan']?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="id_ongkir">
                        <option value="">Choose Delivery Location</option>
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM ongkir");
                        while($perongkir = $ambil->fetch_assoc()){
                        ?>
                        <option value="<?php echo $perongkir["id_ongkir"] ?>">
                            <?php echo $perongkir['nama_kota'] ?> 
                            Rp.<?php echo number_format($perongkir['tarif']) ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label>Detail Address</label>
            <textarea class="form-control" name="alamat_pengiriman" placeholder="Input your shipping address details(Zip code include)"></textarea>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php
        if (isset($_POST["checkout"]))
        {
            $id_pelanggan = $_SESSION["customer"]["id_pelanggan"];
            $id_ongkir = $_POST["id_ongkir"];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $nama_kota = $arrayongkir['nama_kota'];
            $tarif = $arrayongkir['tarif'];

            $total_pembelian = $totalbelanja + $tarif;

            // 1. menyimpan data ke tabel pembelian
            $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) 
            VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman') ");
            
            // mendapatkan id_pembelian barusan terjadi
            $id_pembelian_barusan = $koneksi->insert_id;

            foreach ($_SESSION["cart"] as $id_produk => $jumlah)
            {       

                // mendapatkan data produk bedasarkan id_produk
                $ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $ukuran = $perproduk['ukuran'];
                $subharga = $perproduk['harga_produk']*$jumlah;
                $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,ukuran,subharga,jumlah) 
                    VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$ukuran','$subharga','$jumlah') ");
            
        
                // script update  stock
                $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
                    WHERE id_produk='id_produk'");
        }

            // mengkosongkan keranjang belanja 
           
            unset($_SESSION["cart"]);


            // ke nota pembelian barusan
            echo "<script>alert('ThankYou for Your Purchase :3');</script>";
            echo "<script>location='bill.php?id=$id_pembelian_barusan';</script>";
        }

       ?>

    </div>
</section>


</body>
</html>