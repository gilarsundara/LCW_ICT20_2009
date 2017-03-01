<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
$pid=$_GET['pid'];
$act=$_GET['act'];
$id=$_GET['id'];
$msg=$_GET['msg'];

if(!isset($pid) && !isset($act))
{
	echo "<table width=\"100%\"><tr><th width=\"70%\">Judul</th><th width=\"30%\">Total Hits</th></tr>
	";
	$result=mysql_query("SELECT * FROM poll_data");
	while($row=mysql_fetch_object($result))
	{
		$result5 = mysql_query("SELECT sum(hits) as hits FROM poll_opsi WHERE pid='$pid'");
		$query_data=mysql_fetch_array($result5);
		$total_hits= (float) $query_data["hits"];
		echo"<tr>\n<td><a href=\"default.php?p=polling&amp;pid=$row->id\"><b>$row->judul</b></a><td>$total_hits</td>\n</tr>\n";
	}
	echo "</table>";
}

if($pid)
{
	echo "<table width=\"100%\"><tr><th>Poll</th></tr>";
	$judul=mysql_fetch_row(mysql_query("SELECT judul FROM poll_data WHERE id='$pid'"));
	$result2=mysql_query("SELECT * FROM poll_opsi WHERE pid='$pid'");
	echo "<tr><td>$judul[0]</td></tr><tr><th>&nbsp;</th></tr>";
	while($row2=mysql_fetch_object($result2))
	{
		$result4 = mysql_query("SELECT sum(hits) as hits FROM poll_opsi WHERE pid='$pid'");
		$query_data=mysql_fetch_array($result4);
		$total_hits= (float) $query_data["hits"];
		$percent=($row2->hits/$total_hits)*100;
		echo"<tr><td>$row2->opsi ===> <img src=\"includes/img.jpg\" width=\"$percent\" height=\"5\" alt=\"\" /> $row2->hits hits </td></tr>\n";
	}
	echo "<tr><td><strong>";
	if(!$msg)
	{
		echo "&nbsp;";
	}
	if(isset($msg) && $msg===1)
	{
		echo "Terima kasih telah memberikan voting.";
	}
	if(isset($msg) && $msg===2)
	{
		echo "Pemberian voting gagal.";
	}
	echo "</strong></td></tr>\n</table>\n";
}
if(isset($act) && ($act==='Vote'))
{
	if($id and $pid)
	{
		$hits=mysql_fetch_row(mysql_query("SELECT hits FROM poll_opsi WHERE id='$id' AND pid='$pid'"));
		$addhits=$hits[0]+1;
		mysql_query("UPDATE poll_opsi SET hits='$addhits' WHERE id='$id' AND pid='$pid'");
		echo"<script>document.location='default.php?p=polling&pid=$pid&msg=1';</script>";
	}
	else
	{
		echo"<script>document.location='default.php?p=polling&pid=$pid&msg=2';</script>";
	}
}
?>