<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");

$result=DB::con()->query("SELECT judul,konten FROM home");
while($row=mysqli_fetch_object($result))
{
	echo "<h3 align=\"left\">$row->judul</h3>";
	echo "<p align=\"justify\">$row->konten</p>";
}
echo "<hr />\n<ul>\n<h3 align=\"left\">Berita Terakhir:</h3>\n";
$result2=DB::con()->query("SELECT id,judul FROM berita WHERE tampilkan='1' ORDER BY id DESC LIMIT 0,5");
while($row2=mysqli_fetch_object($result2))
{
	echo "<li style=\"text-align: left;\"><a href=\"default.php?p=berita&amp;mode=detail&amp;id=$row2->id\">$row2->judul</a></li>\n";
}
echo "</ul>\n";
?>