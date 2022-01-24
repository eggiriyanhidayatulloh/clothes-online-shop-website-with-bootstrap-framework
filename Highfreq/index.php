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
    <style>
body {
    margin: 0;
}
.slide {
    max-width: auto;
    height: 690px;
    position: relative;
}
.slide1,.slide2,.slide3 {
    position: absolute;
    width: 100%;
    height: 95%;
}
.slide1 {
    background: url(tes.jpeg) no-repeat center;
    background-size: cover;
    animation: fade 8s infinite;
    -webkit-animation: fade 8s infinite;
}
.slide2 {
    background: url(tes2.jpeg) no-repeat center;
    background-size: cover;
    animation: fade2 8s infinite;
    -webkit-animation: fade2 8s infinite;
}
.slide3 {
    background: url(tes3.jpeg) no-repeat center;
    background-size: cover;
    animation: fade3 8s infinite;
    -webkit-animation: fade3 8s infinite;
}
@keyframes fade{
    0%{opacity: 1;}
    33.333%{opacity: 0;}
    66.666%{opacity: 0;}
    100%{opacity: 1;}
}
@keyframes fade2{
    0%{opacity: 0;}
    33.333%{opacity: 1;}
    66.666%{opacity: 0;}
    100%{opacity: 0;}
}
@keyframes fade3{
    0%{opacity: 0;}
    33.333%{opacity: 0;}
    66.666%{opacity: 1;}
    100%{opacity: 0;}
}
.row .card:hover {
        box-shadow:  2px 2px 2px rgba(0,0,0,0.4);
        transform: scale(1.02);
}
    </style>
</head>
    <body>
        

    </style>
</head>
<body>
    <?php include 'menu.php'; ?> 
<!-- carousel -->
<div class="slide">
        <div class="slide1"></div>
        <div class="slide2"></div>
        <div class="slide3"></div>
</div>
<!-- konten -->
<?php
include 'footer.php';
?> 
</body>
</html>