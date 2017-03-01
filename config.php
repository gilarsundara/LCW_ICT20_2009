<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
$host="localhost";
$db="lcw"; #isikan nama database anda
$user="root"; #isikan username mysql anda
$pass=""; #isikan password mysql anda

mysql_connect($host,$user,$pass) or die("Koneksi dengan database belum terhubung");
mysql_select_db($db) or die("Database belum ada");
?>
