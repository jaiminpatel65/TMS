<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtOrgName=$_POST['txtOrgName'];
$txtAddress=$_POST['txtAddress'];
$txtpincode=$_POST['txtpincode'];
$txtPhoneNo=$_POST['txtPhoneNo'];
$txtEmail=$_POST['txtEmail'];
$txtWebsite=$_POST['txtWebsite'];
$listExperience=$_POST['listExperience'];
$listNatureWork=$_POST['listNatureWork'];
$txtMonth=$_POST['txtMonth'];
$listDesignation=$_POST['listDesignation'];
$txtSalary=$_POST['txtSalary'];
$txtJoinDate=$_POST['txtJoinDate'];
$txtLeavingDate=$_POST['txtLeavingDate'];
$txtReason=$_POST['txtReason'];
include_once('../connect.php');
$query="update employee_experience set organization_name='".$txtOrgName."',address='".$txtAddress."',pin_code='".$txtpincode."',phone_no='".$txtPhoneNo."',
	email_id='".$txtEmail."',website_name='".$txtWebsite."',type_of_experience_id=".$listExperience.",
		type_of_nature_of_work_id=".$listNatureWork.",no_of_months=".$txtMonth.",designation_id=".$listDesignation.",gross_monthly_salary=".$txtSalary.",
		joining_date='".$txtJoinDate."',leavin_date='".$txtLeavingDate."',reason_of_leaving='".$txtReason."' where employee_experience_id=".$id;
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