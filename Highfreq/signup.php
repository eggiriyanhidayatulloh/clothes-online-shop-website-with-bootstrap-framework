<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row">
        <br><br><br><br><br><br>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Member? Sign Up Now!</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alias</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="alias">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">E-mail</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Address</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Whatsapp/HP</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="telepon" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" name="daftar">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <?php 
                        //jika tombol daftar ditekan
                        if (isset($_POST["daftar"]))
                        {
                            //mengambil isian data
                            $nama = $_POST["nama"];
                            $alias = $_POST["alias"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];
                        
                            //cek apakah email sudah digunakan
                            $ambil = $koneksi->query("SELECT * FROM pelanggan 
                            WHERE email_pelanggan='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1)
                            {
                                echo "<script>alert('This email address is already being used!');</script>";
                                echo "<script>location='signup.php';</script>";
                            }
                            else
                            {
                                //query insert ke tabel pelanggan
                                $koneksi->query("INSERT INTO pelanggan 
                                    (email_pelanggan,password_pelanggan,nama_pelanggan,
                                    no_pelanggan,alamat_pelanggan)
                                    VALUES('$email','$password','$nama','$telepon','$alamat') ");

                                    echo "<script>alert('Congratulations, your account has been successfully created.');</script>";
                                    echo "<script>location='login.php';</script>";
                            }

                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>