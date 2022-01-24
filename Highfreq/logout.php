<?php
session_start();

// BOOM!
session_destroy();

echo "<script>alert('You Are Logout!');</script>";
echo "<script>location='index.php';</script>";

?>