<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtProjectTitle=$_POST['txtProjectTitle'];
$txtSubmittedBody=$_POST['txtSubmittedBody'];
$txtSubmitDate=$_POST['txtSubmitDate'];
$txtApprovedDate=$_POST['txtApprovedDate'];
$txtStartDate=$_POST['txtStartDate'];
$txtCompletionDate=$_POST['txtCompletionDate'];
$txtStatus=$_POST['txtStatus'];
$txtAmount=$_POST['txtAmount'];
$txtMemberName=$_POST['txtMemberName'];
$txtRemark=$_POST['txtRemark'];
$txtAPIScore=$_POST['txtAPIScore'];
include_once('../connect.php');
$query="update research_project set project_title='".$txtProjectTitle."',submitted_to_body_funding_agency='".$txtSubmittedBody."',submitted_on_date='".$txtSubmitDate."',
	approved_date='".$txtApprovedDate."',start_date='".$txtStartDate."',completion_date='".$txtCompletionDate."',status='".$txtStatus."',
	budger_amount=".$txtAmount.",member_name='".$txtMemberName."',remark='".$txtRemark."',API_score=".$txtAPIScore." where research_project_id=".$id;
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