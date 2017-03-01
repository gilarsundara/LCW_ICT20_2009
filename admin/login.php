<?php
define("admin",1,true);
define("home",1,true);
session_start();
include "../config.php";
if($_SESSION['admin'] != 'admin')
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
<link rel="shortcut icon" type="image/gif" href="../favicon.gif" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
<table class="centerBoth">
<tbody>
<tr>
<td>
<form action="" method="post">
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>    <td height="120" colspan="2"><div align="center"><img src="../images/login_h.png" width="400" height="120" alt="Private" /></div></td>
  </tr>
  <tr>
    <td width="277" height="250">

        <div align="center">
          <table border="0">
            <tr>
              <td colspan="3">&nbsp;<?php
	if($_POST['login'])
	{
		$result=mysql_query("SELECT username,password FROM user WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."' AND blok='0'");
		if(mysql_num_rows($result)!=1)
		{
			echo "<b>Harap isikan username dan password dengan benar</b>";
		}
		else
		{
			$_SESSION['admin'] = 'admin';
			$_SESSION['username'] = $_POST['username'];
			echo "<script>document.location='index.php?sid=".session_id()."';</script>";
		}
	}
}
?></td></tr>
            <tr>
              <td>Username</td><td>:</td> <td><input type="text" name="username" /></td>
            </tr>
            <tr>
              <td>Password</td><td>:</td><td><input name="password" type="password" id="password" /></td>
            </tr>
            <tr>
              <td></td><td></td><td><input name="login" type="submit" id="login" value="Login" /><input name="reset" type="reset" id="reset" value="Reset" /></td>
            </tr>
          </table>
        </div>

	</td>
    <td width="123" height="250"><img src="../images/login_r.png" width="123" height="213" alt="" /></td>
  </tr>
</table>
 </form>
</td>
</tr>
</tbody>
</table>

</body>
</html>
