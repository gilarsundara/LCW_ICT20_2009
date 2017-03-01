<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah logout');document.location='login.php?err=2';</script>";
?>
