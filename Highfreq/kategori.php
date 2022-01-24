<?php
session_start();
//koneksi ke database
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Higher Frequencies</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
*{
        margin: 0;
        padding: 0;
    }
        ul li .dropdown{
            display: none;
        }
        ul li:hover .dropdown{    
            display: block;
            padding: 10px;
            position: absolute;
            background-color: whitesmoke;
        }
        ul li:hover .dropdown li{
            left: 25%;
            margin-bottom: 5px;
            display: block;
        }
        nav ul ul li {
            float: none;
            display: list-item;
            width: 80px;
        }
        a:hover .dropdown{
            background-color: #333;
        }
        .nav {
            position: relative;
            background-color: whitesmoke;
        }
        .navbar {
            width: 100%;
            position: fixed;
            display: flex;
            background-color: whitesmoke;
        }
        .row .card:hover {
        box-shadow:  1px 1px 1px rgba(0,0,0,0.4);
        transform: scale(1.02);
        }
        .row .card {
            margin-bottom: 20px;
        }
        .copyright{
                    background: darkgray;
                    width: 100%;
                    text-align: center;
                    padding: 4px 0;
                }
                .copyright .p{
                    font-weight: bold;
                }
    </style>
</head>
    <body>
        

    </style>
</head>
<body> 
<!-- Menu -->

<nav class="navbar navbar-fixed-top navbar-default ">
    <div class="container">
    <a class="navbar-brand  font-weight-bold" href="#page-top">Higher Frequencies</a>
    <ul class="nav navbar-nav navbar-right">

        <li><a href="index.php">Home </a></li>
        <li><a href="cart.php">Cart </a></li>
        <li><a href="">Category </a>                     
                <ul class="dropdown">
                <?php
                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                if (mysqli_num_rows($kategori) > 0){
                                    while($k = mysqli_fetch_array($kategori)){
                        ?>
                            <a href="kategori.php?kat=<?php echo $k['id_kategori']?>" name="kat" method="get">
                    <li href="kategori.php" class="dropdown-item"><?php echo $k['nama_kategori']  ?></li>
                            </a> 
                    <?php }}else{?>
                        <P>Kategori Tidak Ada</P>
                    <?php } ?>
                </ul>
            </li>
        <?php if (isset($_SESSION["customer"])): ?>
            <li><a href="history.php">History </a></li>
            <li><a href="logout.php">Logout </a></li>
        <?php else: ?>
            <li><a href="signup.php">Sign Up </a></li>
            <li><a href="login.php">Login </a></li>
        <?php endif ?>
        <form action="search.php" method="get" class="navbar-form navbar-right ">
            <input type="text" class="form-control" name="keyword">
            <button class="btn btn-primary">Search <i class="glyphicon glyphicon-search" ></i></button>
        </form>
        </ul>


    </div>
</nav>
<!-- konten -->
<section class="konten">
<div class="container">  
    <?php
        $kat = $_GET["kat"];

        $ambill = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$kat'");
        $jkat = $ambill->fetch_assoc();
    ?>
        <br><br><br>
        <center>
        <h1><?php echo $jkat["nama_kategori"]; ?></h1>
        </center>
        <br>
    <div class="row">
                <?php
                        $kat = $_GET["kat"];
                        $semuadata=array();
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori LIKE '%$kat%'");
                        while ($pecah = $ambil->fetch_assoc())
                            {
                                $semuadata[]=$pecah;
                            }
                ?>
                        <?php foreach ($semuadata as $key => $perproduk) : ?>

            <div class="card col-md-3">          
                    <div class="thumbnail">
                            <img src="Product_photo/<?php echo $perproduk['foto_produk'] ?>" alt="">
                        <div class="caption">
                            <h3><?php echo $perproduk['nama_produk']; ?></h3>
                            <h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?>,-</h5>
                            <a href="buy.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Buy <i class="glyphicon glyphicon-tags" ></i></a>
                            <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default" >Detail <i class="glyphicon glyphicon-eye-open" ></i></a>
                        </div>
                    </div>
                </div> 
            <?php endforeach ?>
</div>

</section>
                                    <div class="copyright text-center text-white font-weight-bold bg-secondary p-2">
                                        <p>Copyright By Higher Frequencies <i class="far fa-copyright"></i> 2021</p>
                                    </div>  
</body>
</html>