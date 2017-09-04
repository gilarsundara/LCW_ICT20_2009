<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
$mode=$_GET['mode'];
$id=$_GET['id'];
if(!isset($mode))
{
	$result=DB::con()->query("SELECT * FROM emagz WHERE tampilkan='1' ORDER BY id DESC LIMIT 0,3");
	while($row=mysqli_fetch_object($result))
	{
		echo "<h3><a href=\"default.php?p=e-magz&amp;mode=view&amp;id=$row->id\"><b>$row->judul</b></a></h3><br><a href=\"default.php?p=e-magz&amp;mode=view&amp;id=$row->id\"><img src=\"e-magz/$row->screenshot\" width=\"100\" height=\"125\" alt=\"\" /></a><br /><b>Rilis</b> : $row->rilis<br /><br /><b>Deskripsi</b> : $row->deskripsi<br />";
	}
}
if(isset($mode) && $mode==='view')
{
	$result2=DB::con()->query("SELECT * FROM emagz WHERE id='$id' AND tampilkan='1'");
	while($row2=mysqli_fetch_object($result2))
	{
		echo "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"800\" height=\"590\" title=\"$row2->judul\">
  <param name=\"movie\" value=\"e-magz/$row2->swf\" />
  <param name=\"quality\" value=\"high\" />
  <embed src=\"e-magz/$row2->swf\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"470\" height=\"310\"></embed>
</object>";
	}
}
?>