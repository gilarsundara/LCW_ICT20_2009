<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");

$mode=$_GET['mode'];


if(!isset($mode))
{
	function artikel($konten,$url)
	{
        $maxkata=20;
        $pecah=explode(' ',$konten);
       
    	if(count($pecah) > $maxkata)
		{
			$cuplik='';
			for($a=0;$a<$maxkata;$a++)
			{
				$cuplik.=$pecah[$a]." " ;
			}
			echo "<tr>\n<td><div align=\"justify\">$cuplik. . . .<a href=\"$url\">Selengkapnya</a></div><td>\n</tr>\n<tr><th>&nbsp;</th></tr>\n";
		}
		else
		{
			echo "<tr>\n<td><div align=\"justify\">$konten</div></td>\n</tr>\n<tr><th>&nbsp;</th></tr>\n";
		}
	}

	$hal = $_GET['hal'];

	if(!isset($_GET['hal']))
	{
    	$hal = 1;
	}
	else
	{
    	$hal = $_GET['hal'];
	}

	$max_results = 3;
	$from = (($hal * $max_results) - $max_results); 
	
	echo "<table width=\"100%\" border=\"0\">\n";
	
	$result=mysql_query("SELECT * FROM berita WHERE tampilkan='1' ORDER BY id DESC LIMIT $from,$max_results");
	
	while($row=mysql_fetch_object($result))
	{
		$url= 'default.php?p=berita&amp;mode=detail&amp;id='.$row->id;
		$konten=$row->konten;
		echo "<tr>\n<td><div align=\"left\"><strong>$row->judul</strong><br />$row->dikirim</td>\n</tr>\n";
		artikel($konten,$url);
	}
	
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM berita"),0);
	$total_pages = ceil($total_results / $max_results); 
	echo "<tr>\n<th>Halaman</th>\n</tr>\n<tr>\n<td>";
	if($hal > 1)
	{
    	$prev = ($hal - 1);
    	echo '<a href="default.php?p=berita&amp;hal='.$prev.'">Sebelumnya</a>';
	}
	for($i = 1; $i <= $total_pages; $i++)
	{
    	if(($hal) == $i)
		{
        	echo "$i ";
        }
		else
		{
			echo '<a href="default.php?p=berita&amp;hal='.$i.'">'.$i.'</a> ';
		}
	}
	if($hal < $total_pages)
	{
    	$next = ($hal + 1);
    	echo '<a href="default.php?p=berita&amp;hal='.$next.'">Selanjutnya</a> ';
	}
	
	echo "</td>\n</tr>\n</table>\n";
}

if(isset($mode) && $mode==='detail')
{
	$id=$_GET['id'];
	$result=mysql_query("SELECT * FROM berita WHERE id='$id'");
	while($row=mysql_fetch_object($result))
	{
		echo "<h2 align=\"left\">$row->judul</h4>\n";
		echo "<h3 align=\"left\">Dikirim pada : $row->dikirim oleh $row->pengirim</h3>\n";
		echo "<p align=\"justify\">$row->konten</p>\n";
		echo "<p align=\"justify\"><a href=\"javascript:history.go(-1)\">Kembali</a></p>\n";
	}
}
?>