<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
echo "<h3 align=\"center\"><a href=\"index.php?p=e-magz&amp;mode=add\">TAMBAH E-MAGAZINE</a> | <a href=\"index.php?p=e-magz\">E-MAGAZINE MANAGER</a></h3>";
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
$result=DB::con()->query("SELECT * FROM emagz ORDER BY id DESC LIMIT $from,$max_results");
$mode=$_GET['mode'];
$id=$_GET['id'];
if(!isset($mode))
{
?>
<table width="80%" border="1" align="center">
<tr>
  <th colspan="4">E-Magazine Manager</th>
</tr>
<tr>
  <td colspan="4">Total e-magazine <?php echo mysqli_num_rows($result); ?></td>
</tr>
<tr class="thnya">
    <th width="5%">ID.</th>
    <th width="25%">Judul E-Magz </th>
    <th width="10%">Rilis</th>
    <th width="25%">Editor</th>
</tr>
<?php while($row=mysqli_fetch_object($result))
{
?>
  <tr>
	<th><?=$row->id;?></th>
	<td><?=$row->judul;?></td>
	<td><?=$row->rilis;?></td>
	<td><a href="index.php?p=e-magz&amp;mode=view&amp;id=<?=$row->id;?>">Lihat</a> | <a href="index.php?p=e-magz&amp;mode=edit&amp;id=<?=$row->id;?>">Edit</a> | <a href="index.php?p=e-magz&amp;mode=delete&amp;id=<?=$row->id;?>">Hapus</a></td>
  </tr><?php
	} $total_results = count(DB::con()->query("SELECT COUNT(*) as Num FROM emagz"),0);
	$total_pages = ceil($total_results / $max_results);
	echo "<tr>\n<th colspan=\"4\">Halaman</th>\n</tr>\n<tr>\n<td colspan=\"4\">";

	if($hal > 1)
	{
    	$prev = ($hal - 1);
    	echo '<a href="index.php?p=e-magz&amp;hal='.$prev.'">Sebelumnya</a> ';
	}
	for($i = 1; $i <= $total_pages; $i++)
	{
    	if(($hal) == $i)
		{
        	echo "$i ";
        }
		else
		{
			echo '<a href="index.php?p=e-magz&amp;hal='.$i.'">'.$i.'</a> ';
		}
	}
	if($hal < $total_pages)
	{
    	$next = ($hal + 1);
    	echo '<a href="index.php?p=e-magz&amp;hal='.$next.'">Selanjutnya</a> ';
	}
	echo "</td>\n</tr>\n</table>";

}
if(isset($mode) && $mode==='view')
{
	$result2=DB::con()->query("SELECT * FROM emagz WHERE id='$id'");
	$row2=mysqli_fetch_object($result2);
?>
	<table width="80%" border="1" align="center">
	  <tr>
		<th colspan="2">DETAIL UNTUK E-MAGZ &quot;<?=$row2->judul;?>&quot;</th>
	  </tr>
	  <tr>
		<td width="20%">ID E-MAGZ </td>
	    <td><?=$row2->id; ?></td>
	  </tr>
	  <tr>
	    <td>JUDUL E-MAGZl</td>
	    <td><?=$row2->judul; ?></td>
      </tr>
	  <tr>
		<td width="20%">RILIS</td>
	  	<td><?=$row2->rilis; ?></td>
	  </tr>
	  <tr>
		<td width="20%">SCREENSHOT</td>
	  	<td><img src="../e-magz/<?=$row2->screenshot; ?>" /></td>
	  </tr>
	  <tr>
		<td>DESKRIPSI</td>
		<td><?=$row2->deskripsi; ?></td>
	  </tr>
	  <tr>
		<td>DETAILl</td>
		<td>"<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="800" height="590" title="<?=$row2->judul;?>">
  <param name="movie" value="../e-magz/<?=$row2->swf;?>" />
  <param name="quality" value="high" />
  <embed src="../e-magz/<?=$row2->swf;?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="650" height="500"></embed>
</object></td>
	  </tr>
</table>
<?php
}

if(isset($mode) && $mode==='on')
{
	DB::con()->query("UPDATE emagz SET tampilkan = '1' WHERE id='$id'");
	echo"<script>alert('E-magazine telah ditampilkan'); document.location='javascript:history.go(-1)';</script>";
}

if(isset($mode) && $mode=='off')
{
	DB::con()->query("UPDATE emagz SET tampilkan = '0' WHERE id='$id'");
	echo"<script>alert('E-magazine telah tidak ditampilkan'); document.location='javascript:history.go(-1)';</script>";
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
	<form action="" method="post" enctype="multipart/form-data">
	<table width="80%" border="1" align="center">
	<tr>
	  <th colspan="2">TAMBAH E-MAGAZINE </th>
	  </tr>
	<tr>
	  <td width="10%">JUDUL E-MAGZ </td>
	  <td><input name="judul" type="text" size="50" /></td></tr>
	<tr>
	  <td>SCREENSHOT</td>
	  <td><input name="screenshot" type="file" size="40" /></td>
	</tr>
	<tr>
	  <td>TAMPILKAN</td>
	  <td><input name="tampilkan" type="radio" value="1" checked="checked" />
	  Ya | <input type="radio" name="tampilkan" value="0" />Tidak</td>
	</tr>
	<tr>
	  <td>DETAIL (*SWF) </td>
	  <td><input name="swf" type="file" id="swf" size="40" /></td>
	  </tr>
	<tr>
	  <td valign="top">DESKRIPSI</td>
	  <td>
	<textarea id="elm1" name="deskripsi" rows="15" cols="80" style="width: 80%"></textarea></td>
	</tr>
	<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Submit" />
	  <input name="reset" type="reset" id="reset" value="Reset" /></td></tr>
	</table>
	</form>
<?php
	if($_POST['submit'])
	{
		$judul=$_POST['judul'];
		$tampilkan=$_POST['tampilkan'];
		$deskripsi=$_POST['deskripsi'];
		$rilis=date("Y-m-d H:i:s");
		$screenshot=$_FILES['screenshot']['name'];
		$swf=$_FILES['swf']['name'];
		if(empty($judul) or empty($tampilkan) or empty($screenshot) or empty($swf) or empty($deskripsi))
		{
			echo"<script>alert('Harap isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		elseif(!empty($judul) && !empty($tampilkan) && !empty($screenshot) && !empty($swf) && !empty($deskripsi))
		{
			$target_path = "../e-magz/";
			$target_path = $target_path . basename($screenshot);
			$target_path2 = "../e-magz/";
			$target_path2 = $target_path2 . basename($swf);

		if(move_uploaded_file($_FILES['screenshot']['tmp_name'], $target_path) && move_uploaded_file($_FILES['swf']['tmp_name'], $target_path2))
		{
			DB::con()->query("INSERT INTO emagz (judul,screenshot,rilis,deskripsi,swf,tampilkan) VALUES('$judul','$screenshot','$rilis','$deskripsi','$swf','$tampilkan');");
			echo"<script>alert('E-magz telah dibuat'); document.location='index.php?p=e-magz';</script>";
			}
			else
			{
				echo "<script>alert('Error !');document.location='javascript:history.go(-1)';</script>";
			}
		}
	}
}

if(isset($mode) && $mode==='edit')
{
	$result3=DB::con()->query("SELECT * FROM emagz WHERE id='$id'");
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
		<th colspan="2">EDIT E-MAGAZINE <?=$row3->judul;?></th>
	  </tr>
	  <tr>
		<td>JUDUL E-MAGZ </td>
		<td><input name="judul" type="text" value="<?=$row3->judul;?>" /></td>
	  </tr>
	  <tr>
		<td width="20%">TAMPILKAN</td>
		<td><input name="tampilkan" type="radio" value="1" checked="checked" />
		Ya | <input type="radio" name="tampilkan" value="0" />
		Tidak [<?php if($row3->tampilkan!=1) { echo"Tidak"; } elseif($row3->tampilkan!=0){ echo"Ya"; } ?>] </td>
	  </tr>

	  <tr>
		<td valign="top">DESKRIPSI</td>
		<td><textarea id="elm1" name="deskripsi" rows="15" cols="80" style="width: 80%"><?=$row3->deskripsi;?></textarea></td>
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
		$judul=$_POST['judul'];
		$deskripsi=$_POST['deskripsi'];
		$tampilkan=$_POST['tampilkan'];
		if(empty($judul) or empty($deskripsi))
		{
			echo"<script>alert('Harap isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		elseif(!empty($judul) && !empty($deskripsi) && !empty($tampilkan))
		{
			DB::con()->query("UPDATE emagz SET judul='$judul' , deskripsi='$deskripsi' , tampilkan='$tampilkan' WHERE id='$id'");
			echo"<script>alert('E-magazine telah diubah'); document.location='index.php?p=e-magz';</script>";
		}
	}
}
if(isset($mode) && $mode==='delete')
{
	DB::con()->query("DELETE FROM emagz WHERE id='$id'");
	echo"<script>alert('E-magazine telah dihapus'); document.location='index.php?p=e-magz';</script>";
}
