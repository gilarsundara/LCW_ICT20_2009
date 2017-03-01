<?php
define("admin",1,true);
define("home",1,true);
session_start();
include "../config.php";
if($_SESSION['admin'] != 'admin')
{
	header("Location: login.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator Area | SMA Negeri 20 Bandung</title>
<link rel="shortcut icon" type="image/gif" href="../favicon.gif" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
<table class="centerBoth">
 <tbody>
  <tr>
   <td>
    <div align="center"><img src="../images/admin_h.png" alt="SMA Negeri 20 Bandung" width="1024" height="80" border="0" /></div>
	<div align="center"><img src="../images/admin_menu.jpg" alt="" width="1024" height="90" usemap="#Menu" border="0" /></div>

	 <table class="admin" align="center" width="70%">
	 <tr>
	 <td valign="top"><?php $p=$_GET['p'];
	if(!isset($p))
	{include "modules/home.php";}
	if(isset($p) && $p==='profil')
	{include "modules/profil.php";}
	if(isset($p) && $p==='berita')
	{include "modules/berita.php";}
	if(isset($p) && $p==='galeri')
	{include "modules/galeri.php";}
	if(isset($p) && $p==='e-magz')
	{include "modules/e-magz.php";}
	if(isset($p) && $p==='bukutamu')
	{include "modules/bukutamu.php";}
	if(isset($p) && $p==='polling')
	{include "modules/polling.php";}
	if(isset($p) && $p==='user')
	{include "modules/user.php";}
	?>
	 </td>
	 </tr>
	 </table>

	<div align="center"><img src="../images/admin_bg2.png" alt="" width="1024" height="52" border="0" /></div>
	<div align="center"><img src="../images/footer.png" alt="" width="1024" height="35" usemap="#FOOTER" border="0" /></div>
	</td>
  </tr>
 </tbody>
</table>


<map name="Menu" id="Menu">
  <area shape="rect" coords="88,35,174,78" href="index.php" alt="" />
  <area shape="rect" coords="174,35,262,78" href="index.php?p=berita" alt="" />
  <area shape="rect" coords="262,35,349,78" href="index.php?p=profil" alt="" />
  <area shape="rect" coords="349,35,448,78" href="index.php?p=e-magz" alt="" />
  <area shape="rect" coords="448,35,536,78" href="index.php?p=galeri" alt="" />
  <area shape="rect" coords="536,35,666,78" href="index.php?p=bukutamu" alt="" />
  <area shape="rect" coords="666,35,766,78" href="index.php?p=polling" alt="" />
  <area shape="rect" coords="766,35,832,78" href="index.php?p=user" alt="" />
  <area shape="rect" coords="832,35,939,78" href="logout.php" alt="" />
</map>

<map name="FOOTER" id="FOOTER">
  <area shape="rect" coords="56,8,103,23" href="../default.php?p=credits" alt="Credits" title="Credits" />
  <area shape="rect" coords="110,8,158,24" href="../default.php?p=sitemap" alt="Sitemap" title="Sitemap" />
  <area shape="rect" coords="710,9,750,25" href="http://jigsaw.w3.org/css-validator/" target="_blank" alt="Valid W3C CSS" title="Valid W3C CSS!" />
  <area shape="rect" coords="760,9,801,25" href="http://validator.w3.org/check?uri=referer" target="_blank" alt="Valid W3C XHTML 1.0" title="Valid W3C XHTML 1.0!" />
</map>


</body>

</html>
