<?php
session_start();
$gbr = "img.jpg"; //gambar untuk background
$merah = "255"; // range nya dari 0 - 255
$ijo = "255"; //range nya = diatas :D
$biru = "255";
$acak1 = mt_rand(3,10); // nilai acak 1
$acak2 = mt_rand(6,20); // nilai acak 2
$strtampil = $acak1." + ".$acak2;
$hasil = $acak1 + $acak2;
$bikingbr =imagecreatefromjpeg($gbr);
$teks = imagecolorallocate($bikingbr, $merah, $ijo, $biru);
imagestring($bikingbr, 5, 20, 10, $strtampil, $teks);
$_SESSION['capcay'] = $hasil;
header("Content-type: image/jpeg");
imagejpeg($bikingbr);
?>

