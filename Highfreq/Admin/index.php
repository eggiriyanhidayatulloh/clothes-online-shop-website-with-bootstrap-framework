<?php
session_start();
//koneksi ke database
include '../connection.php';


if (!isset($_SESSION['admin']))
{
    echo "<script>alert('You Must Login First')</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}


?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Higher Frequencies's Homepage</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <script src="assets/js/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Homepage HF</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> ADMIN &nbsp; <a href="#" class="btn btn-danger square-btn-adjust"><i class="glyphicon glyphicon-off" ></i> Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="index.php?halaman=category"><i class="fa fa-laptop"></i> Category</a></li>
                    <li><a href="index.php?halaman=product"><i class="fa fa-list"></i> Product</a></li>		
                    <li><a href="index.php?halaman=cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>	
                    <li><a href="index.php?halaman=payment_note"><i class="fa fa-credit-card"></i> Report</a></li>	
                    <li><a href="index.php?halaman=checkout"><i class="fa fa-truck"></i> Checkout</a></li>	
                    <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="product")
                    {
                        include 'product.php';
                    }
                    elseif ($_GET['halaman']=="cart")
                    {
                    include 'cart.php';
                    }
                    elseif ($_GET['halaman']=="checkout")
                    {
                        include 'checkout.php';
                    }
                    elseif ($_GET['halaman']=="detail")
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="addproduct")
                    {
                        include 'addproduct.php';
                    }
                    elseif ($_GET['halaman']=="deleteproduct")
                    {
                        include 'deleteproduct.php';
                    }
                    elseif ($_GET['halaman']=="editproduct")
                    {
                        include 'editproduct.php';
                    }
                    elseif ($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="payment")
                    {
                        include 'payment.php';
                    }
                    elseif ($_GET['halaman']=="payment_note")
                    {
                        include 'paymentnote.php';
                    }
                    elseif ($_GET['halaman']=="category")
                    {
                        include 'category.php';
                    }
                    elseif ($_GET['halaman']=="detailproduct")
                    {
                        include 'detailproduct.php';
                    }
                    elseif ($_GET['halaman']=="deletephoto")
                    {
                        include 'deletephoto.php';
                    }
                }
                else
                {
                    include 'home.php';
                }
                ?>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
