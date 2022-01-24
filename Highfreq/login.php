<?php
session_start();

include 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Customer</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <style>
    </style>
</head>
<body>


<?php include 'menu.php'; ?>
<br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <br><br>
        <div class="col-md-4 col-md-offset-4" >
           <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login Customer</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class ="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary" name="login">Login</button>
                   
                    </form>
                </div>
           </div>
        </div>
</div>
</div>
<?php

if (isset($_POST["login"]))
{

    $email = $_POST["email"];
    $password = $_POST["password"];
    // query check di tabel pelanggan
    $ambil = $koneksi->query("SELECT * FROM pelanggan
        WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
    
    // hitung akun terambil
    $akunyangcocok = $ambil->num_rows;

    // jika 1 akun cocok, maka login
    if ($akunyangcocok==1)
    {
        // sukses login
        // mendapat akun bentuk array
        $akun = $ambil->fetch_assoc();
        // simpan di session pelanggan
        $_SESSION["customer"] = $akun;
        echo "<script>alert('Login Success!');</script>";
        
        // jika sudah belanja
        if (isset($_SESSION["cart"]) OR !empty($_SESSION["cart"]))
        {
            echo "<script>location='checkout.php';</script>";
        }
        else
        {
            echo "<script>location='history.php';</script>";
        }
    }
    else
    {
        // gagal login
        echo "<script>alert('Incorrect Username or Password!');</script>";
        echo "<script>location='login.php';</script>";
    }
}

?>
</body>
</html>