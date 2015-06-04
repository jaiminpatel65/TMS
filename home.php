<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:index.php'); 
}
?>
<?php
	$role_id=$_SESSION['role_id'];
	if($role_id==1)
	{
		header('Location:Admin/adminHome.php'); 
	}
	elseif($role_id==2)
	{
		echo "Directer";
	}
	elseif($role_id==3)
	{
		echo "Cleck";
	}
	elseif($role_id==4)
	{
		echo "HOD";
	}
	elseif($role_id==5)
	{
		echo "Faculty";
	}
	
?>
<html>
<body>
<br>
	<a href="logout.php">logout</a>
</body>
</html>