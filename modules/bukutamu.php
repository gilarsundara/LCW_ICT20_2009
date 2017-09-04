<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");

$mode=$_GET['mode'];
$msg=$_GET['msg'];
if(!isset($mode))
{
	$hal = $_GET['hal'];

	if(!isset($_GET['hal']))
	{
    	$hal = 1;
	}
	else
	{
    	$hal = $_GET['hal'];
	}

	$max_results = 5;
	$from = (($hal * $max_results) - $max_results);  
	$result=DB::con()->query("SELECT * FROM bukutamu ORDER BY id DESC LIMIT $from,$max_results ");
	
	echo "<table width=\"100%\" border=\"0\">\n<tr>\n<td colspan=\"2\"><h2><a href=\"default.php?p=bukutamu&amp;mode=kirim\">Kirim Pesan</a></h2></td>\n</tr>\n";
	if(isset($msg) && $msg===1)
	  {
	  	echo "<tr><th colspan=\"2\"><font color=\"red\">Terima kasih telah mengisi bukutamu.</td>\n</font></tr>\n";
	  }
	 
	echo "<tr>\n<th>Pengirim</td>\n\n<th>Pesan</th>\n</tr>";
	while($row=mysqli_fetch_object($result))
	{
		echo "<tr>\n<td border=\"3\"><div align=\"left\"><a href=\"mailto:$row->email\">$row->nama</a><br />
$row->dikirim</div></td><td><div align=\"left\">$row->pesan</div></td>\n</tr>\n";
	}

	$total_results = count(DB::con()->query("SELECT COUNT(*) as Num FROM bukutamu"));
	$total_pages = ceil($total_results / $max_results); 
	echo "<tr>\n<td colspan=\"2\">Halaman</td>\n</tr>\n<tr>\n<td colspan=\"3\">";
	
	if($hal > 1)
	{
    	$prev = ($hal - 1);
    	echo '<a href="default.php?p=bukutamu&amp;hal='.$prev.'">Sebelumnya</a> ';
	}
	for($i = 1; $i <= $total_pages; $i++)
	{
    	if(($hal) == $i)
		{
        	echo "$i ";
        }
		else
		{
			echo '<a href="default.php?p=bukutamu&amp;hal='.$i.'">'.$i.'</a> ';
		}
	}
	if($hal < $total_pages)
	{
    	$next = ($hal + 1);
    	echo '<a href="default.php?p=bukutamu&amp;hal='.$next.'">Selanjutnya</a> ';
	}
	echo "</td>\n</tr>\n</table>\n";
}
if(isset($mode) && $mode==='kirim')
{
?>
	<form action="" method="POST">
	<table width="100%" style="text-align: left;">
	  <tr>
		<td colspan="3"><h2><a href="default.php?p=bukutamu">Kembali ke Bukutamu</a></h2></td>
	  </tr>
	  <?
      if(isset($msg) && $msg==='1')
	  {
	  	echo "<a name=\"#1\"><tr><th colspan=\"3\" align=\"center\"><font color=\"red\">Harap isikan data dengan benar.</font></td>\n</tr></a>\n";
	  }
	  if(isset($msg) && $msg==='2')
	  {
	  	echo "<a name=\"#2\"><tr><th colspan=\"3\" align=\"center\"><font color=\"red\">Kode verifikasi salah,harap coba lagi.</font></td>\n</tr></a>\n";
	  }
	  if(isset($msg) && $msg==='3')
	  {
	  	echo "<a name=\"#3\"><tr><th colspan=\"3\" align=\"center\"><font color=\"red\">Harap mengisi email dengan benar.</font></td>\n</tr></a>\n";
	  }
	  ?>
	  <tr>
		<td width="15%" align="left" valign="top"><div align="left">Nama<br />
		  <input name="nama" type="text" id="nama" size="20" maxlength="20" />
		  Email<br />
		  <input name="email" type="text" id="email" size="20" maxlength="50" />
		  Verfikasi<br />
<img src="includes/image.php" width="46" height="29" />
<input name="image" type="text" size="2" maxlength="2" />
		</div></td>
		<td width="85%" align="left" valign="top"><div align="left">Pesan<br />
		  <textarea name="pesan" cols="30" rows="4" id="pesan"></textarea><br />
		  <input type="submit" name="kirim" value="Kirim" />
		  <input type="reset" name="batal" value="Batal" />
		</div></td>
	  </tr>
	</table>
	</form>
<?php
	if($_POST['kirim'])
	{
		$nama=$_POST['nama'];
		$email=$_POST['email'];
		$pesan=strip_tags($_POST['pesan']);
		$dikirim=date("Y-m-d H:i:s");
		if(empty($nama) or empty($pesan) or empty($email))
		{
			echo "<script>document.location='default.php?p=bukutamu&mode=kirim&msg=1#1';</script>";
		}
		if($_SESSION['capcay']!=$_POST['image'])
		{
			echo "<script>document.location='default.php?p=bukutamu&mode=kirim&msg=2#3';</script>";
		}
		if(!empty($nama) && !empty($pesan) && !empty($email))
		{
			if(!(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z0-9-]+)+$",$email)))
			{
				echo "<script>adocument.location='default.php?p=bukutamu&mode=kirim&msg=3#3';</script>";
			} 
			elseif(!empty($nama) && !empty($pesan) && eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z0-9-]+)+$",$email))
			{
				DB::con()->query("INSERT INTO bukutamu (nama,email,pesan,dikirim) VALUES('$nama','$email','$pesan','$dikirim');");
				echo "<script>document.location='default.php?p=bukutamu&msg=1';</script>";
			}
		}
	}
}
?>

