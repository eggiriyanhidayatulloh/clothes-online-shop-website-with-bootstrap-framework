<h2>Detail Checkout</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
        <div class="col-md-4">
            <h3>Purchase</h3>
            <strong>No. PEMBELIAN : <?php echo $detail['id_pembelian'] ?></strong><br>
            Date: <?php echo $detail['tanggal_pembelian']; ?><br>
            Total: Rp.<?php echo number_format($detail['total_pembelian']) ?>,-
        </div>
        <div class="col-md-4">
            <h3>Customer</h3>
            <strong>NAMA : <?php echo $detail['nama_pelanggan']; ?></strong><br>
            Phone(WA): <?php echo $detail['no_pelanggan']; ?> <br>
            E-mail: <?php echo $detail['email_pelanggan']; ?>
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
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Ukuran</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk
        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td> Rp.<?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['ukuran']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
                Rp.<?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table> 