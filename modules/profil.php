<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");

$result=DB::con()->query("SELECT * FROM profil WHERE tampilkan='1' ORDER BY id ASC");
echo "<h4>";
while($row=mysqli_fetch_object($result))
{
	echo "<a href=\"default.php?p=profil&amp;id=$row->id\">$row->judul</a> &curren; \n ";
}
echo "</h4>\n";
$id=$_GET['id'];
if(!isset($id))
{
	echo "<hr /><h3 align=\"center\">Profil Sekolah</h3><br><a href=\"default.php?p=galeri\" alt=\"Ke Galeri\"><img src=\"galeri/1.jpg\" width=\"240\" height=\"180\" alt=\"\" /></a>";
}
$result2=DB::con()->query("SELECT * FROM profil WHERE id='$id' AND tampilkan='1'");
while($row2=mysqli_fetch_object($result2))
{
	echo "<hr />";
	echo "<h3 align=\"left\">$row2->judul</h5>\n";
	echo "<p align=\"justify\">$row2->konten</p>\n";
}
?>