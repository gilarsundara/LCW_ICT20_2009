<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
echo "<h3 align=\"center\"><a href=\"index.php?p=galeri&amp;mode=add\">TAMBAH GAMBAR</a> | <a href=\"index.php?p=galeri\">GALERI MANAGER</a></h3>";
$mode=$_GET['mode'];
if(!isset($mode))
{
	echo "<h3>UNTUK MELIHAT LEBIH JELAS ATAU MENGEDITNYA SILAHKAN KLIK GAMBAR TERSEBUT</h3>";
	function dirlist($dir, $bool = "dirs")
	{
		$truedir = $dir;
		$dir = scandir($dir);
		if($bool == "files")
		{
			$direct = 'is_dir';
		}
		elseif($bool == "dirs")
		{
			$direct = 'is_file';
		}
		foreach($dir as $k => $v)
		{
			if(($direct($truedir.$dir[$k])) || $dir[$k] == '.' || $dir[$k] == '..' )
			{
				unset($dir[$k]);
			}
		}
	    $dir = array_values($dir);
	    return $dir;
	}
	$dir = "../galeri/"; //You could add a $_GET to change the directory
	$files = dirlist($dir,"files");
	foreach($files as $key => $value)
	{
		echo "<a href=\"index.php?p=galeri&amp;mode=view&amp;filename=$value\"><img src=\"$dir$value\" alt=\"\" width=\"200\"/></a>\n";
	}
}
if(isset($mode) && $mode==='view')
{
	$filename=$_GET['filename'];
	echo "<img src=\"../galeri/$filename\" alt=\"\" width=\"300\" /><br /><h3><a href=\"index.php?p=galeri&amp;mode=delete&amp;filename=$filename\">HAPUS</a></h3>";
}
if(isset($mode) && $mode==='delete')
{
	$filename=$_GET['filename'];
	unlink("../galeri/$filename");
	echo "<h3>Gambar dengan nama $filename telah terhapus. <a href=\"index.php?p=galeri\">Kembali ke galeri manager</a></h3>";
}
if(isset($mode) && $mode==='add')
{
?>
<form action="" enctype="multipart/form-data" method="post">
<table width="75%" border="0">
  <tr>
    <th colspan="3">TAMBAH GAMBAR PADA GALERI </th>
  </tr>
  <tr>
    <td>file</td>
    <td>:</td>
    <td><input name="gambar" type="file" size="40" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Submit" />
    <input name="reset" type="reset" id="reset" value="Reset" /></td>
  </tr>
</table>
</form>

<?php
	if($_POST['submit'])
	{
		$target_path = "../galeri/";
		$target_path = $target_path . basename( $_FILES['gambar']['name']);
		if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path))
		{
    		echo "File ".  basename( $_FILES['uploadedfile']['name'])."<h3><img src=\"../galeri/".$_FILES['gambar']['name']."\" alt=\"\" width=\"400\"/><br />
Upload gambar berhasil</h3>";
		}
		else
		{
    		echo "Upload file gagal,harap ulangi !";
		}
	}


}
?>
