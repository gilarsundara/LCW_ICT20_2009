<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
echo "<h3 align=\"center\"><a href=\"index.php?p=bukutamu&amp;mode=kosongkan\">KOSONGKAN BUKUTAMU</a> | <a href=\"index.php?p=bukutamu\">BUKUTAMU MANAGER</a></h3>";
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
$result=DB::con()->query("SELECT * FROM bukutamu ORDER BY id DESC LIMIT $from,$max_results");
$mode=$_GET['mode'];
$id=$_GET['id'];
if(!isset($mode))
{
?>
<table width="80%" border="1" align="center">
<tr>
  <th colspan="4">Bukutamu Manager</th>
</tr>
<tr>
  <td colspan="4">Total pesan <?php echo mysqli_num_rows($result); ?></td>
</tr>
<tr class="thnya">
    <th width="5%">ID.</th>
    <th width="25%">NAMA</th>
    <th width="35%">EMAIL</th>
    <th width="25%">EDITOR</th>
</tr>
<?php while($row=mysqli_fetch_object($result))
{
?>
  <tr>
	<th><?=$row->id;?></th>
	<td><?=$row->nama;?></td>
	<td><a href="mailto:<?=$row->email ?>"><?=$row->email ?></a></td>
	<td><a href="index.php?p=bukutamu&amp;mode=view&amp;id=<?=$row->id;?>">Lihat Pesan</a> | <a href="index.php?p=bukutamu&amp;mode=delete&amp;id=<?=$row->id;?>">Hapus</a></td>
  </tr><?php
	}
	$total_results = mysqli_result(DB::con()->query("SELECT COUNT(*) as Num FROM bukutamu"),0);
	$total_pages = ceil($total_results / $max_results);
	echo "<tr>\n<th colspan=\"4\">Halaman</th>\n</tr>\n<tr>\n<td colspan=\"4\">";

	if($hal > 1)
	{
    	$prev = ($hal - 1);
    	echo '<a href="index.php?p=bukutamu&amp;hal='.$prev.'">Sebelumnya</a> ';
	}
	for($i = 1; $i <= $total_pages; $i++)
	{
    	if(($hal) == $i)
		{
        	echo "$i ";
        }
		else
		{
			echo '<a href="index.php?p=bukutamu&amp;hal='.$i.'">'.$i.'</a> ';
		}
	}
	if($hal < $total_pages)
	{
    	$next = ($hal + 1);
    	echo '<a href="index.php?p=bukutamu&amp;hal='.$next.'">Selanjutnya</a> ';
	}
	echo "</td>\n</tr>\n</table>";
}
if(isset($mode) && $mode==='delete')
{
	DB::con()->query("DELETE FROM bukutamu WHERE id='$id'");
	echo"<script>alert('Pesan telah dihapus'); document.location='index.php?p=bukutamu';</script>";
}
if(isset($mode) && $mode==='kosongkan')
{
	DB::con()->query("TRUNCATE TABLE bukutamu");
	echo"<script>alert('Bukutamu telah dikosongkan'); document.location='index.php?p=bukutamu';</script>";
}
if(isset($mode) && $mode==='view')
{
	$result2=DB::con()->query("SELECT * FROM bukutamu WHERE id='$id'");
	$row2=mysqli_fetch_object($result2);
?>
	<table width="80%" border="1" align="center">
	  <tr>
		<th colspan="2">DETAIL UNTUK  &quot;<?=$row2->dikirim;?>&quot;</th>
	  </tr>
	  <tr>
	    <td>DIKIRIM PADA </td>
	    <td><?=$row2->dikirim; ?></td>
      </tr>
	  <tr>
		<td width="20%">NAMA</td>
	    <td><?=$row2->nama; ?></td>
	  </tr>
	  <tr>
		<td width="20%">EMAIL</td>
	  	<td><?=$row2->email; ?></td>
	  </tr>
	  <tr>
		<td>PESAN</td>
		<td><?=$row2->pesan; ?></td>
	  </tr>
</table>
<?php
}
?>
