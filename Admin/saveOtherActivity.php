<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtActivityName=$_POST['txtActivityName'];
$listActivity=$_POST['listActivity'];
$listLevel=$_POST['listLevel'];
$txtOrganized=$_POST['txtOrganized'];
$txtSponsored=$_POST['txtSponsored'];
$txtAddress=$_POST['txtAddress'];
$listTypeNatureWork=$_POST['listTypeNatureWork'];
$txtFromDate=$_POST['txtFromDate'];
$txtToDate=$_POST['txtToDate'];
include_once('../connect.php');
$query="update other_activity set activity_name='".$txtActivityName."',activity_type_id=".$listActivity.",event_level_id=".$listLevel."
	,organized_by='".$txtOrganized."',sponsored_by='".$txtSponsored."',loaction='".$txtAddress."',type_of_nature_of_work_id=".$listTypeNatureWork.",
	from_date='".$txtFromDate."',to_date='".$txtToDate."' where activity_id=".$id;
	echo $query;
$query_result=mysql_query($query);
?>
<html>
<head>
	<script src="../jquery/jquery-1.1.4.js"></script>
	<script type="text/javascript" >
		$(document).ready(function(){
			location.href="adminHome.php";
		});
	</script>
</head>
</html>