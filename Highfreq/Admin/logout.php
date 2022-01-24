<?php
session_destroy();
echo "<script>alert('You are logout');</script>";
echo "<script>location='login.php';</script>";
?>