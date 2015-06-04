<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtPaperTitle=$_POST['txtPaperTitle'];
$txtTitleSeminar=$_POST['txtTitleSeminar'];
$txtOrganized=$_POST['txtOrganized'];
$txtSponsored=$_POST['txtSponsored'];
$txtDate=$_POST['txtDate'];
$listEventLevel=$_POST['listEventLevel'];
$listEventType=$_POST['listEventType'];
$txtCoAuther=$_POST['txtCoAuther'];
$txtRank=$_POST['txtRank'];
$txtAPIScore=$_POST['txtAPIScore'];
include_once('../connect.php');
$query="update employee_presented_paper set title_of_presented_paper='".$txtPaperTitle."',title_of_conference_seminar='".$txtTitleSeminar."',organized_by='".$txtOrganized."',
		sponsored_by='".$txtSponsored."',date='".$txtDate."',event_level_id=".$listEventLevel.",event_type_id=".$listEventType.",
		co_author='".$txtCoAuther."',rank_if_any='".$txtRank."',API_score=".$txtAPIScore." 
		where employee_presented_paper_id=".$id;
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