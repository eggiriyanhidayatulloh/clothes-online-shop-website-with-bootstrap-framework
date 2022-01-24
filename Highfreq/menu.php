
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <style type="text/css">
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
    </style>
</head>
<body>
    <nav class="navbar navbar-fixed-top navbar-default ">
    <div class="container">
    <a class="navbar-brand  font-weight-bold" href="#page-top">Higher Frequencies</a>
    <ul class="nav navbar-nav navbar-right">

        <li><a href="index.php">Home </a></li>
        <li><a href="cart.php">Cart </a></li>
        <li><a >Category </a>                     
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
</body>
</html>