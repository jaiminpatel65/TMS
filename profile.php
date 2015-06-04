<?php 
session_start(); 
if(isset($_SESSION['login_id']) && isset($_SESSION['reason']))
{
if($_SESSION['login_id']=="" || $_SESSION['reason']!="first")
{
	include_once('logout.php'); 
}
}
?>
<?php
	include_once('connect.php');
if(isset($_SESSION['login_id']))
{
	$loginId=$_SESSION['login_id'];
	$query="select e.name,r.role_name,d.department_name
		from login l,employee e,uesr_role ur,role r,department  d
	where l.employee_id=e.employee_id and ur.login_id=l.login_id and 
	r.role_id=ur.role_id and d.department_id=e.department_id and l.login_id='".$loginId."'";
	$query_result=mysql_query($query);
	$result=mysql_fetch_array($query_result);
	$name=$result["name"];
	$role=$result["role_name"];
	$department=$result["department_name"];
	echo "Login Id =" . $loginId;
	echo "<br> Name = ".$name;
	echo "<br> Department = " .$department;
	echo "<br> Role = ".$role;
}else{
	include_once('logout.php');
}
?>