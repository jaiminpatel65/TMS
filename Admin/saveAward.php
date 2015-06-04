<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtAwardName=$_POST['txtAwardName'];
$txtAwardActivity=$_POST['txtAwardActivity'];
$txtAwardAmount=$_POST['txtAwardAmount'];
$txtEventTitle=$_POST['txtEventTitle'];
$listEventType=$_POST['listEventType'];
$listEventLevel=$_POST['listEventLevel'];
$txtDate=$_POST['txtDate'];
$txtOrganized=$_POST['txtOrganized'];
$txtSponsored=$_POST['txtSponsored'];
$txtAddress=$_POST['txtAddress'];
include_once('../connect.php');
$query="update award set award_name='".$txtAwardName."',award_for_activity='".$txtAwardActivity."',award_amount=".$txtAwardAmount."
	event_title='".$txtEventTitle."',event_type_id=".$listEventType.",event_level_id=".$listEventLevel.",date='".$txtDate."',
	organized_by='".$txtOrganized."',sponsored_by='".$txtSponsored."',location='".$txtAddress."' where award_id=".$id;
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