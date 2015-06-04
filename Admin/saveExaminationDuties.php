<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$listNatureWork=$_POST['listNatureWork'];
$txtDate=$_POST['txtDate'];
$txtExaminationBody=$_POST['txtExaminationBody'];
$txtInstituteName=$_POST['txtInstituteName'];
$txtAddress=$_POST['txtAddress'];
include_once('../connect.php');
$query="update examination_duties set type_of_examination_duty_id=".$listNatureWork.",date='".$txtDate."',examination_body='".$txtExaminationBody."',
	institute_name='".$txtInstituteName."',location='".$txtAddress."'
	where examination_duties_id=".$id;
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