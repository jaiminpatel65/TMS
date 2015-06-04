<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
include('hed.php');
$interestId=$_GET['interestId'];
if($interestId==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select e.interest_name from  employee_interest e,interest_type i where e.interest_type_id=i.interest_type_id and e.employee_interest_id=".$interestId;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
?>
<html>
<head>
	<script src="../jquery/jquery-1.1.4.js"></script>
	<script type="text/javascript" >
		$(document).ready(function(){
			$("#btnCancal").click(function(){
				location.href="adminHome.php";
			});
			$("#fUpdateInterest").submit(function(){
				alert("Update Successful..");
			});
		});
	</script>
</head>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Employee Intrest Information</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Employee Intrest</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form id="fUpdateInterest" action="saveInterest.php" method="post">
	<input type="hidden" id="txtInterestId" name="txtInterestId" value="<?php echo $interestId; ?>">
	<tr><td>Name Of Interest</td><td><input type="text" id="txtInterest" name="txtInteresrt" value="<?php echo $result['interest_name'];?>"></td></tr>
	<tr><td>Interest Type</td> 
	<td><select id="listInterestType" name="listInterestType">
	<option value="0"> -- </option>
	<?php
		$query="select * from  interest_type";
		$query_result=mysql_query($query);
		while($result=mysql_fetch_array($query_result)){
			echo "<option value='".$result['interest_type_id']."'>".$result['interest_type']."</option>";
		}
	?>
	</select></td></tr>
	<tr><td>
	<input type="submit" id="btnSave" name="btnSave" value="Save" />
	<input type="button" class="formbutton" id="btnCancal" name="btnCancal" value="Cancal"/>
	</td></tr>
	</form>
	</table>
	</div>
</article>
</section>
</body>
</html>