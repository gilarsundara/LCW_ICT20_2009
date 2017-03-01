<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
echo "<h3 align=\"center\"><a href=\"index.php?p=polling&amp;mode=add\">TAMBAH POLL</a> | <a href=\"index.php?p=polling\">POLL MANAGER</a> | <a href=\"index.php?p=polling&mode=show\">TAMPILKAN POLLING PADA WEBSITE</a></h3>";
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
$result=mysql_query("SELECT * FROM poll_data ORDER BY id ASC LIMIT $from,$max_results");
$mode=$_GET['mode'];
$id=$_GET['id'];
if(!isset($mode))
{
?>
<table width="80%" border="1" align="center">
<tr>
  <th colspan="4">Polling Manager </th>
</tr>
<tr>
  <td colspan="4">Total polling <?php echo mysql_num_rows($result); ?></td>
</tr>
<tr class="thnya">
    <th width="5%">ID.</th>
    <th width="25%">Judul</th>
    <th width="35%">Hits</th>
    <th width="25%">Editor</th></tr>
<?php while($row=mysql_fetch_object($result))
{
?>
  <tr>
	<th><?=$row->id;?></th>
	<td><?=$row->judul;?></a></td>
	<td><?php $result4 = mysql_query("SELECT sum(hits) as hits FROM poll_opsi WHERE pid='$row->id'");
		$query_data=mysql_fetch_array($result4);
		$total_hits= (float) $query_data["hits"];
		echo $total_hits; ?></td>
	<td><a href="index.php?p=polling&amp;mode=view&amp;id=<?=$row->id;?>">Lihat</a> | <a href="index.php?p=polling&amp;mode=delete&amp;id=<?=$row->id;?>">Hapus</a></td>
  </tr><?php
	}
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM poll_data"),0);
	$total_pages = ceil($total_results / $max_results);
	echo "<tr>\n<th colspan=\"4\">Halaman</th>\n</tr>\n<tr>\n<td colspan=\"4\">";

	if($hal > 1)
	{
    	$prev = ($hal - 1);
    	echo '<a href="index.php?p=polling&amp;hal='.$prev.'">Sebelumnya</a> ';
	}
	for($i = 1; $i <= $total_pages; $i++)
	{
    	if(($hal) == $i)
		{
        	echo "$i ";
        }
		else
		{
			echo '<a href="index.php?p=polling&amp;hal='.$i.'">'.$i.'</a> ';
		}
	}
	if($hal < $total_pages)
	{
    	$next = ($hal + 1);
    	echo '<a href="index.php?p=polling&amp;hal='.$next.'">Selanjutnya</a> ';
	}
	echo "</td>\n</tr>\n</table>";

}
if(isset($mode) && $mode==='view')
{
	$result2=mysql_query("SELECT * FROM poll_data WHERE id='$id'");
	$row2=mysql_fetch_object($result2);
?>
	<table width="80%" border="1" align="center">
	  <tr>
		<th colspan="2">DETAIL UNTUK  &quot;<?=$row2->nama_lengkap;?>&quot;</th>
	  </tr>
	  <tr>
		<td width="20%">ID POLLING </td>
	    <td><?=$row2->id; ?></td>
	  </tr>
	  <tr>
		<td width="20%">JUDUL</td>
	  	<td><?=$row2->judul; ?></td>
	  </tr><?php
	  $result4=mysql_query("SELECT * FROM poll_opsi WHERE pid='$row2->id'");
	  while($row4=mysql_fetch_object($result4))
	  {
	  ?>
	  <tr>
		<td>OPTION</td>
		<td><?php echo "$row4->opsi ===> $row4->hits"; ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <tr>
		<td>HITS</td>
		<td><?php $result4 = mysql_query("SELECT sum(hits) as hits FROM poll_opsi WHERE pid='$row2->id'");
		$query_data=mysql_fetch_array($result4);
		$total_hits= (float) $query_data["hits"];
		echo $total_hits; ?></td>
	  </tr>
</table>
<?php
}


if(isset($mode) && $mode==='add')
{
?>
	<form action="" method="post">
	<table width="80%" border="1" align="center">

	<tr>
	  <th colspan="2">TAMBAH POLLING </th>
	</tr>
	<tr>
	  <td>JUDUL</td>
	  <td><input name="judul" type="text" size="40" />
	    *</td>
	 </tr>
	 <tr>
	  <th colspan="2">KOSONGKAN OPSI BILA TIDAK DIPERLUKAN DAN MINIMAL OPSI 2 DAN BOLEH LEBIH</th>
  </tr>
	<tr>
	   <td>OPSI 1 </td>
	   <td><input name="opsia" type="text" id="opsi" size="30" />
	     *</td>
  </tr>
	 <tr>
	   <td>OPSI 2 </td>
	   <td><input name="opsib" type="text" id="opsi2" size="30" />
	   *</td>
  </tr>
	 <tr>
	   <td>OPSI 3 </td>
	   <td><input name="opsic" type="text" id="opsi3" size="30" /></td>
  </tr>
	 <tr>
	   <td>OPSI 4 </td>
	   <td><input name="opsid" type="text" id="opsi4" size="30" /></td>
  </tr>
	 <tr>
	   <td>OPSI 5 </td>
	   <td><input name="opsie" type="text" id="opsi5" size="30" /></td>
  </tr>
	 <tr>
	   <td>OPSI 6 </td>
	   <td><input name="opsif" type="text" id="opsi6" size="30" /></td>
  </tr>
	 <tr>
	   <td>OPSI 7</td>
	   <td><input name="opsig" type="text" id="opsi7" size="30" /></td>
  </tr>
	 <tr>
	   <td>OPSI 8 </td>
	   <td><input name="opsih" type="text" id="opsi8" size="30" /></td>
    </tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td><input type="submit" name="submit" value="Submit" />
       <input name="reset" type="reset" id="reset" value="Reset" /></td>
  </tr>
	</table>
	</form>
<?php
	if($_POST['submit'])
	{
		$result7=mysql_query("SELECT * FROM poll_data ORDER BY id DESC LIMIT 0,1");
		$row7=mysql_fetch_object($result7);
		$pidnew=$row7->id;
		if($pidnew<1)
		{
			$pidnew=1;
		}
		$judul=$_POST['judul'];
		$opsia=$_POST['opsia'];
		$opsib=$_POST['opsib'];
		$opsic=$_POST['opsic'];
		$opsid=$_POST['opsid'];
		$opsie=$_POST['opsie'];
		$opsif=$_POST['opsif'];
		$opsig=$_POST['opsig'];
		$opsih=$_POST['opsih'];
		if(empty($judul) or empty($opsia) or empty($opsib))
		{
			echo"<script>alert('Isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		if(!empty($judul) && !empty($opsia) && !empty($opsib))
		{
			mysql_query("INSERT INTO poll_data (judul) VALUES('$judul');");
			mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsia');");
			mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsib');");
			if(!empty($opsic))
			{
				mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsic');");
			}
			if(!empty($opsid))
			{
				mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsid');");
			}
			if(!empty($opsie))
			{
				mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsie');");
			}
			if(!empty($opsif))
			{
				mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsif');");
			}
			if(!empty($opsig))
			{
				mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsig');");
			}
			if(!empty($opsih))
			{
				mysql_query("INSERT INTO poll_opsi (pid,opsi) VALUES('$pidnew','$opsih');");
			}
			echo"<script>alert('Polling telah dibuat.');document.location='index.php?p=polling';</script>";
		}
	}
}

if(isset($mode) && $mode==='delete')
{
	mysql_query("DELETE FROM poll_data WHERE id='$id'");
	mysql_query("DELETE FROM poll_opsi WHER pid='$id'");
	echo"<script>alert('Polling telah dihapus'); document.location='index.php?p=polling';</script>";
}
if(isset($mode) && $mode==='show')
{
	$result8=mysql_query("SELECT value FROM konfig WHERE nama='pid'");
	$row8=mysql_fetch_object($result8);
	$result9=mysql_query("SELECT judul FROM poll_data WHERE id='$row8->value'");
	$row9=mysql_fetch_object($result9);

?>
<form action="" method="post">
<table width="80%" border="1" align="center">
  <tr>
    <th colspan="3">POLLING YANG DITAMPILKAN DI WEBSITE </th>
  </tr>
  <tr>
    <td>POLLING YANG DIPILIH DI WEBSITE ADALAH </td>
    <td>:</td>
    <td><?=$row9->judul;?></td>
  </tr>
  <tr>
    <td>UBAH POLLING YANG DITAMPILKAN DI HOME </td>
    <td>:</td>
    <td><select name="pid"><?php
	$result10=mysql_query("SELECT * FROM poll_data ORDER BY id ASC");
	while($row10=mysql_fetch_object($result10))
	{
	?>
      <option value="<?=$row10->id;?>"><?=$row10->judul;?></option>
	 <?php
	 }
	 ?>
    </select></td>
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
		$pid=$_POST['pid'];
		mysql_query("UPDATE konfig SET value='$pid' WHERE name='pid'");
		echo "<script>alert('Polling home telah di ubah');document.location='index.php?p=polling';</script>";
	}
}
?>
