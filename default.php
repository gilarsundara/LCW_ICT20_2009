<?php
define("home",1,true);
session_start();
require "includes/config.php";
require "includes/helper.php";

$p = isset($_GET['p']) ? $_GET['p'] : '';
$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
$pid = isset($_GET['pid']) ? $_GET['pid'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Sekolah Menengah Atas Negeri 20 Bandung - Berkualitas Bersih Sehat Indah." />
<meta name="keywords" content="SMAN 20 Bandung, SMA Negeri 20 Bandung, SMA Negeri, SMU Negeri, Sekolah Menengah Atas" />
<title><?php
             includes\helper::set_title($p,$mode,$pid,$id,$act);
?> | SMA Negeri 20 Bandung</title>
<link rel="shortcut icon" type="image/gif" href="favicon.gif" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="alternate" type="application/rss+xml" title="SMAN 20 Bandung feed" href="rss.php" />
</head>

<body onload="MM_preloadImages('images/menu_1b.jpg','images/menu_2b.jpg','images/menu_3b.jpg','images/menu_4b.jpg','images/menu_5b.jpg','images/menu_6b.jpg')">

<table class="centerBoth">
<tbody>
<tr>
<td>

<div align="center"><img src="images/header.png" alt="SMA Negeri 20 Bandung" width="1024" height="80" border="0" /></div>

<div align="center">
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="73" height="500"><img src="images/spacer_l.jpg" alt="" width="73" height="500" /></td>
<td width="202" height="500">
<div><img src="images/menu_h.jpg" alt="Menu" width="202" height="84" /></div>
<div><a href="default.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('HOME','','images/menu_1b.jpg',1)"><img src="images/menu_1.jpg" alt="HOME" title="Halaman Depan" name="HOME" width="202" height="27" border="0" id="HOME" /></a></div>
<div><a href="default.php?p=profil" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('PROFIL','','images/menu_2b.jpg',1)"><img src="images/menu_2.jpg" alt="PROFIL" title="Profil Sekolah" name="PROFIL" width="202" height="25" border="0" id="PROFIL" /></a></div>
<div><a href="default.php?p=berita" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('BERITA','','images/menu_3b.jpg',1)"><img src="images/menu_3.jpg" alt="BERITA" title="Berita Sekolah" name="BERITA" width="202" height="26" border="0" id="BERITA" /></a></div>
<div><a href="default.php?p=galeri" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('GALERI','','images/menu_4b.jpg',1)"><img src="images/menu_4.jpg" alt="GALERI" title="Galeri Foto" name="GALERI" width="202" height="25" border="0" id="GALERI" /></a></div>
<div><a href="default.php?p=e-magz" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('E-MAGZ','','images/menu_5b.jpg',1)"><img src="images/menu_5.jpg" alt="E-MAGZ" title="Majalah Elektronik" name="E-MAGZ" width="202" height="25" border="0" id="E-MAGZ" /></a></div>
<div><a href="default.php?p=bukutamu" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('BUKUTAMU','','images/menu_6b.jpg',1)"><img src="images/menu_6.jpg" alt="BUKU TAMU" title="Buku Tamu" name="BUKUTAMU" width="202" height="26" border="0" id="BUKUTAMU" /></a></div>
<div><img src="images/menu_f.jpg" alt="" width="202" height="262" /></div>
</td>
<td width="474" height="500">
<div><img src="images/content_h_<?php

if(empty($p))
{echo 1;}
elseif($p=='profil')
{echo 2;}
elseif( $p=='berita')
{echo 3;}
elseif( $p=='galeri')
{echo 4;}
elseif( $p=='e-magz')
{echo 5;}
elseif( $p=='bukutamu')
{echo 6;}
elseif( $p=='polling')
{echo 7;}
elseif( $p=='credits')
{echo 8;}
elseif( $p=='sitemap')
{echo 9;}
?>.jpg" alt="" width="474" height="107" /></div>
<div class="content">
<table align="center" width="90%">
<tr>
<td align="left"><?php
if(empty($p))
{require "modules/home.php";}
if($p=='berita')
{require "modules/berita.php";}
if($p=='profil')
{require "modules/profil.php";}
if($p=='galeri')
{require "modules/galeri.php";}
if($p=='e-magz')
{require "modules/e-magz.php";}
if($p=='bukutamu')
{require "modules/bukutamu.php";}
if($p=='polling')
{require "modules/polling.php";}
if($p=='credits')
{require "modules/credits.php";}
if($p=='sitemap')
{require "modules/sitemap.php";}
?>
</td>
</tr>
</table>
</div>
<div><img src="images/content_f.gif" alt="" width="474" height="71" /></div>
</td>
<td width="33" height="500"><img src="images/spacer_mr.jpg" alt="" width="33" height="500" /></td>
<td width="169" height="500">
<div><img src="images/polling_h.jpg" alt="" width="169" height="84" /></div>
<div class="polling"><?php require "includes/polling.php" ?></div>
<div><img src="images/links.png" alt="" width="169" height="264" usemap="#LINKS" border="0" /></div>
</td>
<td width="73" height="500"><img src="images/spacer_r.jpg" alt="" width="73" height="500" /></td>
</tr>
</table>
</div>

<div align="center"><img src="images/footer.png" alt="" width="1024" height="35" usemap="#FOOTER" border="0" /></div>

</td>
</tr>
</tbody>
</table>

<map name="FOOTER" id="FOOTER">
<area shape="rect" coords="56,8,103,23" href="default.php?p=credits" alt="Credits" title="Credits" />
<area shape="rect" coords="110,8,158,24" href="default.php?p=sitemap" alt="Sitemap" title="Sitemap" />
<area shape="rect" coords="710,9,750,25" href="http://jigsaw.w3.org/css-validator/" target="_blank" alt="Valid W3C CSS" title="Valid W3C CSS!" />
<area shape="rect" coords="760,9,801,25" href="http://validator.w3.org/check?uri=referer" target="_blank" alt="Valid W3C XHTML 1.0" title="Valid W3C XHTML 1.0!" />
</map>

<map name="LINKS" id="LINKS">
<area shape="poly" coords="77,173,34,169,25,157,34,145,80,147" href="http://www.sman20bandung.sch.id/w20" title="Ke Web 20" target="_blank" alt="W20" />
<area shape="poly" coords="80,206,83,178,146,184,163,202,143,218" href="http://www.sman20bandung.sch.id/f20" title="Ke Forum 20" target="_blank" alt="F20" />
</map>

<script type="text/javascript" src="js/javascript.js"></script>

</body>

</html>
