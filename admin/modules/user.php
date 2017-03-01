<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
echo "<h3 align=\"center\"><a href=\"index.php?p=user&amp;mode=add\">TAMBAH USER</a> | <a href=\"index.php?p=user\">USER MANAGER</a></h3>";
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
$result=mysql_query("SELECT * FROM user ORDER BY id ASC LIMIT $from,$max_results");
$mode=$_GET['mode'];
$id=$_GET['id'];
if(!isset($mode))
{ ?>
<table width="80%" border="" align="center">
<tr>
  <th colspan="4">User Manager</th>
</tr>
<tr>
  <td colspan="4">Total user <?=mysql_num_rows($result);?></td>
</tr>
<tr class="thnya">
    <th width="5%">ID.</th>
    <th width="25%">Username</th>
    <th width="35%">Status</th>
    <th width="25%">Editor</th></tr>
<?php while($row=mysql_fetch_object($result)){ ?>
  <tr>
	<th><?=$row->id;?></th>
	<td><a href="mailto:<?=$row->email;?>"><?=$row->username;?></a></td>
	<td><?php if($row->blok!=1){echo"[ Tidak di blok ] ><a href=\"index.php?p=user&amp;mode=on&amp;id=$row->id\">Blok</a>";}
if($row->blok!=0){echo"[ Di blok ] ><a href=\"index.php?p=user&amp;mode=off&amp;id=$row->id\">Jangan di blok</a>";} ?></td>
	<td><a href="index.php?p=user&amp;mode=view&amp;id=<?=$row->id;?>">Lihat</a> | <a href="index.php?p=user&amp;mode=edit&amp;id=<?=$row->id;?>">Edit</a> | <a href="index.php?p=user&amp;mode=delete&amp;id=<?=$row->id;?>">Hapus</a></td>
  </tr><?php
}
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM user"),0);
	$total_pages = ceil($total_results / $max_results);
	echo "<tr>\n<th colspan=\"4\">Halaman</th>\n</tr>\n<tr>\n<td colspan=\"4\">";

	if($hal > 1)
	{
    	$prev = ($hal - 1);
    	echo '<a href="index.php?p=user&amp;hal='.$prev.'">Sebelumnya</a> ';
	}
	for($i = 1; $i <= $total_pages; $i++)
	{
    	if(($hal) == $i)
		{
        	echo "$i ";
        }
		else
		{
			echo '<a href="index.php?p=user&amp;hal='.$i.'">'.$i.'</a> ';
		}
	}
	if($hal < $total_pages)
	{
    	$next = ($hal + 1);
    	echo '<a href="index.php?p=user&amp;hal='.$next.'">Selanjutnya</a> ';
	}
	echo "</td>\n</tr>\n</table>";
}
if(isset($mode) && $mode==='view')
{
	$result2=mysql_query("SELECT * FROM user WHERE id='$id'");
	$row2=mysql_fetch_object($result2);
?>
	<table width="80%" border="1" align="center">
	  <tr>
		<th colspan="2">DETAIL UNTUK  &quot;<?=$row2->nama_lengkap;?>&quot;</th>
	  </tr>
	  <tr>
		<td width="20%">ID USER </td>
	    <td><?=$row2->id; ?></td>
	  </tr>
	  <tr>
		<td width="20%">USERNAME</td>
	  	<td><?=$row2->username; ?></td>
	  </tr>
	  <tr>
		<td>NAMA LENGKAP </td>
		<td><?=$row2->nama_lengkap; ?></td>
	  </tr>
	  <tr>
		<td>EMAIL</td>
		<td><a href="mailto:<?=$row2->email;?>"><?=$row2->email;?></a></td>
	  </tr>
</table>
<?php }

if(isset($mode) && $mode==='on')
{
	mysql_query("UPDATE user SET blok = '1' WHERE id='$id'");
	echo"<script>alert('User telah di blok'); document.location='javascript:history.go(-1)';</script>";
}

if(isset($mode) && $mode=='off')
{
	mysql_query("UPDATE user SET tampilkan = '0' WHERE id='$id'");
	echo"<script>alert('User tidak di blok'); document.location='javascript:history.go(-1)';</script>";
}

if(isset($mode) && $mode==='add')
{
?>
	<form action="" method="post">
	<table width="80%" border="1" align="center">
	<tr>
	  <th colspan="2">TAMBAH USER</th>
	</tr>
	<tr>
	  <td>NAMA</td>
	  <td><input name="nama_lengkap" type="text" id="nnama_lengkap" size="40" /></td>
	<tr>
	  <td width="10%">USERNAME</td>
	  <td><input name="username" type="text" size="30" /></td>
	</tr>
	<tr>
	  <td>PASSWORD</td>
	  <td><input name="password" type="password" size="30" /></td>
	</tr>
	<tr>
	  <td>VERIFIKASI PASSWORD </td>
	  <td><input name="password2" type="password" size="30" /></td>
	</tr>
	<tr>
	  <td>EMAIL</td>
	  <td><input name="email" type="text" size="50" />
	</td>
	<tr>
	  <td>BLOK</td>
	  <td><input type="radio" name="blok" value="1" />Ya | <input name="blok" type="radio" value="0" checked="checked" />
	  Tidak</td>
	</tr>
	<tr>

	  <td>&nbsp;</td>
	  <td><input type="submit" name="submit" value="Submit" />
      <input name="reset" type="reset" id="reset" value="Reset" /></td></tr>
	</table>
	</form>
<?php 	if($_POST['submit'])
	{
		$nama_lengkap=$_POST['nama_lengkap'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$email=$_POST['email'];
		$blok=$_POST['blok'];
		if(empty($username) or empty($nama_lengkap) or empty($email) or empty($password) or empty($password2))
		{
			echo"<script>alert('Isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		if($password!=$password2)
		{
			echo"<script>alert('Password dan konfirmasi password harus sama !'); document.location='javascript:history.go(-1)';</script>";
		}
		if(!empty($username) && !empty($nama_lengkap) && !empty($email) && $password=$password2)
		{
			$md5=md5($password);
			mysql_query("INSERT INTO user (username,password,nama_lengkap,email,blok) VALUES('$username','$md5','$nama_lengkap','$email','$blok');");
			echo"<script>alert('User telah di tambahkan'); document.location='index.php?p=user';</script>";
		}
	}
}


if(isset($mode) && $mode==='edit')
{
	$result3=mysql_query("SELECT * FROM user WHERE id='$id'");
	$row3=mysql_fetch_object($result3);
?>
	<form action="" method="post">
	<table width="80%" border="1" align="center">
	  <tr>
		<th colspan="2">EDIT USER <?=$row3->nama_lengkap;?></th>
	  </tr>
	  <tr>
		<td width="20%">Blok</td>
		<td><input name="blok" type="radio" value="1" />
		Ya | <input name="blok" type="radio" value="0" checked="checked" />
		Tidak [<? if($row3->blok!=1) { echo"Tidak"; } else if($row3->blok!=0){ echo"Ya"; } ?>] </td>
	  </tr>
	  <tr>
		<td>Nama Lengkap</td>
		<td><input name="nama_lengkap" type="text" value="<?=$row3->nama_lengkap;?>" size="40" /></td>
	  </tr>
	  <tr>
		<td>Password</td>
		<td><input name="password" type="password" size="30" /></td>
	  </tr>
	  <tr>
		<td>Verifikasi Password</td>
		<td><input name="password2" type="password" size="30" /></td>
	  </tr>
	  <tr>
		<td>email</td>
		<td><input name="email" type="text" value="<?=$row3->email;?>" size="50" /></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Submit" /> <input type="reset" name="reset" value="Reset" /></td>
	  </tr>
	</table>
	</form>
<?php	if($_POST['submit'])
	{
		$nama_lengkap=$_POST['nama_lengkap'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$email=$_POST['email'];
		$blok=$_POST['blok'];
		if(empty($nama_lengkap) or empty($email) or empty($password) or empty($password2))
		{
			echo"<script>alert('Isikan data dengan benar !'); document.location='javascript:history.go(-1)';</script>";
		}
		if($password!=$password2)
		{
			echo"<script>alert('Password dan konfirmasi password harus sama !'); document.location='javascript:history.go(-1)';</script>";
		}
		if(!empty($nama_lengkap) && !empty($email) && $password=$password2)
		{
			$md5=md5($password);
			mysql_query("UPDATE user SET nama_lengkap='$nama_lengkap' , password='$md5', email='$email' , blok='$blok' WHERE id='$id'");
			echo"<script>alert('User telah diubah'); document.location='index.php?p=user';</script>";
		}
	}
}
if(isset($mode) && $mode==='delete')
{
	mysql_query("DELETE FROM user WHERE id='$id'");
	echo"<script>alert('User telah dihapus'); document.location='index.php?p=user';</script>";
}
