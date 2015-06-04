<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtEventName=$_POST['txtEventName'];
$listEventType=$_POST['listEventType'];
$listNatureWork=$_POST['listNatureWork'];
$txtOrganized=$_POST['txtOrganized'];
$txtSponsored=$_POST['txtSponsored'];
$txtAddress=$_POST['txtAddress'];
$txtDate=$_POST['txtDate'];
include_once('../connect.php');
$query="update invited_as_resource_person set event_name='".$txtEventName."',event_type_id=".$listEventType.",type_of_nature_of_work_id=".$listNatureWork."
	,organized_by='".$txtOrganized."',sponsored='".$txtSponsored."',location='".$txtAddress."',date='".$txtDate."'
	where invited_as_resource_person=".$id;
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