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

<h2>Add Product</h2>
<form method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kategori">
            <option value="">Pilih Kategoti</option>
            <?php foreach ($datakategori as $key => $value): ?>

            <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga">
    </div>
        <select class="form-control" name="ukuran">
            <option value="">Pilih Ukuran</option>
            <option> S </option>
            <option> L </option>
            <option> XL </option>
        </select>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <div class="letak-input" style="margin-bottom: 10px;">
            <input type="file" class="form-control" name="foto[]">
        </div>  
        <span class="btn btn-primary btn-tambah">
            <i class="fa fa-plus"></i>
        </span>
    </div>
    <button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i> Save</button>

</form>
<?php
if (isset($_POST['save']))
{
    $namanamafoto = $_FILES['foto']['name'];
    $lokasilokasifoto = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasilokasifoto[0], "../Product_photo/".$namanamafoto[0]);
    $koneksi->query("INSERT INTO produk
        (nama_produk,harga_produk,ukuran,foto_produk,deskripsi_produk,id_kategori)
        VALUES('$_POST[nama]','$_POST[harga]','$_POST[ukuran]','$namanamafoto[0]','$_POST[deskripsi]','$_POST[id_kategori]')");

    //mendapatkan id_produk barusan
    $id_produk_barusan = $koneksi->insert_id;

    foreach ($namanamafoto as $key => $tiap_nama)
    {
        $tiap_lokasi = $lokasilokasifoto[$key];

        move_uploaded_file($tiap_lokasi, "../Product_photo/".$tiap_nama);

        //simpan ke mysql 
        $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto)
            VALUES ('$id_produk_barusan','$tiap_nama') "); 
    }

    echo "<div class='alert alert-info'>Data has been saved</div>";
    echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=produk'>";

}
?>



<script>
    $(document).ready(function(){
        $(".btn-tambah").on("click",function(){
            $(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
        })
    })
</script>