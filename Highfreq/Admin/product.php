<h2>Product Data</h2>

<table class="table table-bordered"> 
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Ukuran</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?>.</td>
            <td><?php echo $pecah['nama_kategori']; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp.<?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['ukuran']; ?></td>
            <td>
                <img src="../Product_photo/<?php echo $pecah['foto_produk']; ?>" width="100">
            </td>
            <td>
                <a  href="index.php?halaman=deleteproduct&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger" 
                onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash" ></i> delete</a>
                <a  href="index.php?halaman=editproduct&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning"
                ><i class="glyphicon glyphicon-edit" ></i> edit</a>
                <a  href="index.php?halaman=detailproduct&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-info"
                ><i class="glyphicon glyphicon-eye-open" ></i> detail</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>

    </tbody>
</table>
<a href="index.php?halaman=addproduct" class="btn btn-primary"><i class="glyphicon glyphicon-ok" ></i> Add Data</a>