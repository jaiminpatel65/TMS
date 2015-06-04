<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
if(isset($_POST['txtInterestId']) && isset($_POST['txtInteresrt']) && isset($_POST['listInterestType']))
{	
include_once('../connect.php');	
		$interestId=$_POST['txtInterestId'];
		$interest=$_POST['txtInteresrt'];
		$interestType=$_POST['listInterestType'];
		$query="update employee_interest set interest_type_id=".$interestType.",interest_name='".$interest."' where employee_interest_id=".$interestId;
		$query_result=mysql_query($query);
}
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