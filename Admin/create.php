<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	include_once('logout.php');  
}
?>
<?php
include_once('../connect.php');
$department=$_POST['department'];
$name=$_POST['name'];
$loginId=$_POST['loginId'];
$role=$_POST['role'];
$query="select login_id from login where login_id='".$loginId."'";
$query_resylt=mysql_query($query);
if($result=mysql_fetch_array($query_resylt))
{
	if($loginId==$result['login_id'])
	{
		echo "0";
	}
}
else{
	$query="insert into employee(employee_id,department_id,name) values(null,".$department.",'".$name."')";
	$query_resylt=mysql_query($query);
	$query="SELECT employee_id FROM employee order by employee_id DESC LIMIT 1";
	$query_resylt=mysql_query($query);
	$result=mysql_fetch_array($query_resylt);
	$employeeId=$result['employee_id'];
	$password="temp";
	$query="insert into login values('".$loginId."','".$password."',".$employeeId.")";
	$query_resylt=mysql_query($query);
	$query="insert into login_status values('".$loginId."','off','first',0)";
	$query_resylt=mysql_query($query);
	$query="insert into uesr_role values('".$loginId."',".$role.")";
	$query_resylt=mysql_query($query);
	echo "1";
}
?>