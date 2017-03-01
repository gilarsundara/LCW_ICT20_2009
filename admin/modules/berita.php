<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
echo "<h3 align=\"center\"><a href=\"index.php?p=berita&amp;mode=add\">Tambah Berita</a> | <a href=\"index.php?p=berita\">Berita Manager</a></h3>";
$hal = $_GET['hal'];
if(!isset($_GET['hal']))
	{
		$hal = 1;
	}
	else
	{
		$hal = $_GET['hal'];
	}

$max_results = 15;
$from = (($hal * $max_results) - $max_results);
$result=mysql_query("SELECT * FROM berita ORDER BY id DESC LIMIT $from,$max_results");
$mode=$_GET['mode'];
$id=$_GET['id'];
if(!isset($mode))
{
?>
<table width="80%" border="1" align="center">
<tr><th colspan="5">Berita manager</th></tr>
<tr><td colspan="5">Total berita <?php echo mysql_num_rows($result); ?></td></tr>
<tr>
    <th width="5%">ID.</th>
    <th width="25%">Judul Berita</th>
    <th width="10%">Pengirim</th>
    <th width="35%">Status</th>
    <th width="25%">Editor</th></tr>
<?php
while($row=mysql_fetch_object($result))
{ ?>
  <tr>
	<th><?=$row->id;?></th>
	<td align="left"><?=$row->judul;?></td>
	<td align="left"><?=$row->pengirim;?></td>
	<td align="left"><?php 
if($row->tampilkan!=1){echo"[ Tidak Ditampilkan ] ><a href=\"index.php?p=berita&amp;mode=on&amp;id=$row->id\">Tampilkan</a>";}
if($row->tampilkan!=0){echo"[ Ditampilkan ] ><a href=\"index.php?p=berita&amp;mode=off&amp;id=$row->id\">Jangan Tampilkan</a>";} ?></td>
	<td align="left"><a href="index.php?p=berita&amp;mode=view&amp;id=<?=$row->id;?>">Lihat</a> | <a href="?p=berita&amp;mode=edit&amp;id=<?=$row->id;?>">Edit</a> | <a href="?p=berita&amp;mode=delete&amp;id=<?=$row->id;?>">Hapus</a></td>
  </tr><?php

	}
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM berita"),0);
	$total_pages = ceil($total_results / $max_results);
	echo "<tr>\n<th colspan=\"5\">Halaman</th>\n</tr>\n<tr>\n<td colspan=\"5\">";

	if($hal > 1)
	{
    	$prev = ($hal - 1);
    	echo '<a href="index.php?p=berita&amp;hal='.$prev.'">Sebelumnya</a> ';
	}
	for($i = 1; $i <= $total_pages; $i++)
	{
    	if(($hal) == $i)
			{
        	echo "$i ";
      }
			else
			{
				echo '<a href="index.php?p=berita&amp;hal='.$i.'">'.$i.'</a> ';
			}
	}
	if($hal < $total_pages)
	{
    	$next = ($hal + 1);
    	echo '<a href="index.php?p=berita&amp;hal='.$next.'">Selanjutnya</a> ';
	}
	echo "</td>\n</tr>\n</table>";

}

if(isset($mode) && $mode==='view')
{
	$result2=mysql_query("SELECT * FROM berita WHERE id='$id'");
	$row2=mysql_fetch_object($result2);
?>
	<table width="80%" border="1" align="center">
	  <tr>
		<th colspan="2">DETAIL UNTUK &quot;<?=$row2->judul;?>&quot;</th>
	  </tr>
	  <tr>
		<td width="20%">ID BERITA </td>
	  <td align="left"><?=$row2->id; ?></td>
	  </tr>
	  <tr>
		<td width="20%">DIKIRIM PADA </td>
	  	<td align="left"><?=$row2->dikirim; ?></td>
	  </tr>
	  <tr>
		<td width="20%">PENGIRIM</td>
	  	<td align="left"><?=$row2->pengirim; ?></td>
	  </tr>
	  <tr>
		<td>JUDUL BERITA </td>
		<td align="left"><?=$row2->judul; ?></td>
	  </tr>
	  <tr>
		<td>ISI BERITA </td>
		<td align="left"><?=$row2->konten;?></td>
	  </tr>
</table>
<?php
}

if(isset($mode) && $mode==='on')
{
	mysql_query("UPDATE berita SET tampilkan = '1' WHERE id='$id'");
	echo"<script>alert('Berita telah ditampilkan'); document.location='javascript:history.go(-1)';</script>";
}

if(isset($mode) && $mode=='off')
{
	mysql_query("UPDATE berita SET tampilkan = '0' WHERE id='$id'");
	echo"<script>alert('Berita telah tidak ditampilkan'); document.location='javascript:history.go(-1)';</script>";
}

if(isset($mode) && $mode==='add')
{
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
	  <th colspan="2">TAMBAH BERITA </th>
	  </tr>
	<tr>
	  <td width="35%" align="left">JUDUL BERITA</td>
	  <td width="65%" align="left"><input name="judul" type="text" size="50" /></td>
	</tr>
	<tr>
	  <td align="left">PENGIRIM</td>
	  <td align="left"><input name="pengirim" type="text" id="pengirim" size="40" /></td>
	</tr>
	<tr>
	  <td align="left">TAMPILKAN</td>
	  <td align="left"><input name="tampilkan" type="radio" value="1" checked="checked" />
	  Ya | <input type="radio" name="tampilkan" value="0" />Tidak</td>
	</tr>
	<tr>
	  <td align="left" valign="top">ISI BERITA </td>
	  <td><textarea id="elm1" name="konten" rows="15" cols="80" style="width: 80%"></textarea></td>
	</tr>
	<tr><td>&nbsp;</td><td align="left"><input type="submit" name="submit" value="Submit" />
	  <input name="Reset" type="reset" id="Reset" value="Reset" /></td>
	</tr>
	</table>
	</form>
<?php
	if($_POST['submit'])
	{
		$judul=$_POST['judul'];
		$konten=$_POST['konten'];
		$pengirim=$_POST['pengirim'];
		$tampilkan=$_POST['tampilkan'];
		$dikirim=date("Y-m-d H:i:s");
		if(empty($judul) or empty($konten) or empty($pengirim))
		{
			echo"<script>alert('Harap isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		elseif(!empty($judul) && !empty($konten) && !empty($pengirim) && !empty($tampilkan))
		{
			mysql_query("INSERT INTO berita (dikirim,judul,pengirim,konten,tampilkan) VALUES('$dikirim','$judul','$pengirim','$konten','$tampilkan');");
			echo"<script>alert('Berita telah dibuat'); document.location='index.php?p=berita';</script>";
		}
	}
}

if(isset($mode) && $mode==='edit')
{
	$result3=mysql_query("SELECT * FROM berita WHERE id='$id'");
	$row3=mysql_fetch_object($result3);
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
		<th colspan="2">EDIT BERITA <?=$row3->judul;?></th>
	  </tr>
	  <tr>
		<td align="left">JUDUL BERITA </td>
		<td align="left"><input name="judul" type="text" value="<?=$row3->judul;?>" size="50" /></td>
	  </tr>
	  <tr>
		<td width="20%" align="left">TAMPILKAN</td>
		<td align="left"><input name="tampilkan" type="radio" value="1" checked="checked" />
		Ya | <input type="radio" name="tampilkan" value="0" />
		Tidak [<? if($row3->tampilkan!=1) { echo"Tidak"; } else if($row3->tampilkan!=0){ echo"Ya"; } ?>] </td>
	  </tr>

	  <tr>
		<td align="left" valign="top">ISI BERITA </td>
		<td align="left"><textarea id="elm1" name="konten" rows="15" cols="80" style="width: 80%"><?=$row3->konten;?></textarea></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td align="left"><input type="submit" name="submit" value="Submit" /> <input type="reset" name="reset" value="Reset" /></td>
	  </tr>
	</table>
	</form>
<?php
	if($_POST['submit'])
	{
		$konten=$_POST['konten'];
		$judul=$_POST['judul'];
		$tampilkan=$_POST['tampilkan'];
		if(empty($judul) or empty($konten))
		{
			echo"<script>alert('Harap isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		elseif(!empty($judul) && !empty($konten) && !empty($tampilkan))
		{
			mysql_query("UPDATE berita SET judul='$judul' , konten='$konten' , tampilkan='$tampilkan' WHERE id='$id'");
			echo"<script>alert('Berita telah diubah'); document.location='index.php?p=berita';</script>";
		}
	}
}
if(isset($mode) && $mode==='delete')
{
	mysql_query("DELETE FROM berita WHERE id='$id'");
	echo"<script>alert('Berita telah dihapus'); document.location='index.php?p=berita';</script>";
}
