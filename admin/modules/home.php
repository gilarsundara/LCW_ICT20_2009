<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
$result=DB::con()->query("SELECT * FROM home");
$mode=$_GET['mode'];
$id=$_GET['id'];
if(!isset($mode))
{
	echo "<h2>Selamat datang </h2> <br />
	<h3><a href=\"index.php?mode=edithome\">Edit halaman depan</a> | <a href=\"index.php?mode=home\">Lihat Halaman depan</a> | <a href=\"index.php?p=berita&amp;mode=add\">Tambahkan berita</a></h3>";
}
if(isset($mode) && $mode==='home')
{
	$result2=DB::con()->query("SELECT * FROM home");
	$row2=mysqli_fetch_object($result2);
?>
	<table width="80%" border="1" align="center">
	  <tr>
		<td>JUDUL HOME </td>
		<td><?=$row2->judul; ?></td>
	  </tr>
	  <tr>
		<td>ISI HOME </td>
		<td><?=$row2->konten;?></td>
	  </tr>
</table>
<?php

}

elseif(isset($mode) && $mode==='edithome')
{
	$result3=DB::con()->query("SELECT * FROM home");
	$row3=mysqli_fetch_object($result3);
?>
	<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
	<form action="" method="post">
	<table width="80%" border="1" align="center">
	  <tr>
		<td>JUDUL HOME </td>
		<td><input name="judul" type="text" value="<?=$row3->judul;?>" size="50" /></td>
	  </tr>
	  <tr>
		<td valign="top">ISI HOME </td>
		<td><textarea id="elm1" name="konten" rows="15" cols="80" style="width: 80%"><?=$row3->konten;?></textarea></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Submit" /> <input type="reset" name="reset" value="Reset" /></td>
	  </tr>
	</table>
	</form>
<?php
	if($_POST['submit'])
	{
		$konten=$_POST['konten'];
		$judul=$_POST['judul'];
		if(empty($judul) or empty($konten))
		{
			echo"<script>alert('Harap isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		elseif(!empty($judul) && !empty($konten))
		{
			DB::con()->query("UPDATE home SET judul='$judul' , konten='$konten'");
			echo"<script>alert('Home telah diubah'); document.location='index.php';</script>";
		}
	}
}
