<?php

class DB
{	
		protected $host ="localhost";
		protected $d = "lcw"; #isikan nama database anda
		protected $user = "root"; #isikan username mysql anda
		protected $pass = "123456"; #isikan password mysql anda



		public static function con()
		{
			$link = new mysqli("localhost", "root", "123456", "lcw");
			if (mysqli_connect_errno())
			{
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			return $link;
		}
}

?>
