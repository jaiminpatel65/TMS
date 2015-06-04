<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	include_once('logout.php');  
}
if(isset($_GET['employee_id']))
{
	$employee_id=$_GET['employee_id'];
if($employee_id=="")
{
	header('Location:getEmployeeId.php'); 
}
}else
{
	header('Location:getEmployeeId.php'); 
}
include_once('insertLink.php');
?>

<html> 
<body>
<table cellspacing="10" cellpadding="10">
  <tr><td><h1> Click on Link you want insert the data.</h1></td></tr>
  </table>
</body>
</html>