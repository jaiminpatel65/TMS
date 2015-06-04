<?php
	$host="localhost";
	$user="root";
	$pass="";
	$con=mysql_connect($host,$user,$pass);
		if(!$con)
		{
				die("database Is not Connect".mysql_error());
		}
		else
		{
			//echo "database connected";
			mysql_select_db("teacher information system");	
		}
?>
