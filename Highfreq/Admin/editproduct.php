<h2>Edit Product</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

//echo "<pre>";
//print_r($pecah);
//echo "</pre>";

?>

<?php 
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc())
{
    $datakategori[] = $tiap;
}

//echo "<pre>";
//print_r ($datakategori);
//echo "</pre>";

?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="id_kategori">
                <option value="">Pilih Kategoti</option>
                <?php foreach ($datakategori as $key => $value): ?>

                <option value="<?php echo $value["id_kategori"] ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]){ echo "selected"; } ?> >
                    <?php echo $value["nama_kategori"] ?>
                    
                </option>
                <?php endforeach ?>
            </select>
        </div>
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <select class="form-control" name="ukuran">
        <option value=""> Pilih Ukuran </option>
        <option> S </option>
        <option> L </option>
        <option> XL </option>
    </select>
    <br>
    <div class="form-group">
        <img src="../Product_photo/<?php echo $pecah['foto_produk'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
    </div>
    <button class="btn btn-primary" name="edit"><i class="glyphicon glyphicon-edit" ></i> Edit</button>
</form>

<?php
if (isset($_POST['edit']))
{
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    // jk foto dirubah
    if (!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, "../Product_photo/$namafoto");

        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
            harga_produk='$_POST[harga]',ukuran='$_POST[ukuran]',
            foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]'
            WHERE id_produk='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
            harga_produk='$_POST[harga]',ukuran='$_POST[ukuran]',
            deskripsi_produk='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('product data has been changed');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>