<h2>Payment Data</h2>

<?php 
// mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];


// mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();


?>

<div class="row">
    <div class="col-md-6"></div>
        <table class="table">
            <tr>
                <th>Name</th>
                <td><?php echo $detail['nama'] ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank'] ?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td>Rp.<?php echo number_format($detail['jumlah']) ?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo $detail['tanggal'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">  
        <img src="../Bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive"> 
    </div>
</div>


<form method="post">
    <div class="form-group">
        <label>Receipt Number</label>
        <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <option value="paid off">Paid off</option>
            <option value="delivered">Delivered</option>
            <option value="cancel">Cancel</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses"><i class="glyphicon glyphicon-thumbs-up" ></i> Process</button>
</form>

<?php 
if (isset($_POST["proses"]))
{
    $resi = $_POST["resi"];
    $status = $_POST["status"]; 
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' 
        WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Data Updated');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>