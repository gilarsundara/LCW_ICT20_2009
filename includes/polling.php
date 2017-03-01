<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");

$result=mysql_query("SELECT value FROM konfig WHERE nama='pid'");
$row=mysql_fetch_object($result);
echo"<form action=\"\" method=\"GET\">";
$result2=mysql_query("SELECT * FROM poll_data WHERE id='$row->value'");
$row2=mysql_fetch_object($result2);
echo"<input type=\"hidden\" name=\"p\" value=\"polling\" /><input type=\"hidden\" name=\"pid\" value=\"$row->value\" />";
echo"<li>$row2->judul</li>";
$result3=mysql_query("SELECT * FROM poll_opsi WHERE pid='$row->value'");
while($row3=mysql_fetch_object($result3))
{
	echo"<li><input type=\"radio\" value=\"$row3->id\" name=\"id\" /> $row3->opsi</li>";
}
echo"<li><input type=\"submit\" name=\"act\" value=\"Vote\" /> <input type=\"submit\" name=\"act\" value=\"Result\" /></li>";
echo"</form>";

?>