<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtName=$_POST['txtName'];
$txtOrganizationType=$_POST['txtOrganizationType'];
$listTypeNatureWork=$_POST['listTypeNatureWork'];
$txtFromDate=$_POST['txtFromDate'];
$txtToDate=$_POST['txtToDate'];
include_once('../connect.php');
$query="update employee_membership set organization_name='".$txtName."',organization_type='".$txtOrganizationType."',type_of_nature_of_work_id=".$listTypeNatureWork.",
	from_date='".$txtFromDate."',to_date='".$txtToDate."' where employee_membership_id=".$id;
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