<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	include_once('logout.php');  
}
if(isset($_GET['employeeId']))
{
	$employee_id=$_GET['employeeId'];
if($employee_id=="")
{
	header('Location:getEmployeeId.php'); 
}
}else
{
	header('Location:getEmployeeId.php');
}
include('insertLink.php');
?>
<html>
<title> Research Project </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Research Project</h4>
<article class="module width_full">
<header><h3 class="tabs_involved">Research Project</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="employeeResearchProject.php" method="post">
					 <input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
		<tr><td>Project Title</td><td><input type="text" id="txtproject_title" name="txtproject_title" /></td></tr>
		<tr><td>Submitted to Body Funding Agency</td><td><input type="text" id="txtsubmitted_to_body_funding_agency" name="txtsubmitted_to_body_funding_agency" /></td></tr>
		<tr><td>Approved Date</td><td><input type="date" id="txtapproved_date" name="txtapproved_date" /></td></tr>
		<tr><td>Start Date</td><td><input type="date" id="txtstart_date" name="txtstart_date" /></td></tr>
		<tr><td>Complition Date</td><td><input type="date" id="txtcomplition_date" name="txtcomplition_date" /></td></tr>
		<tr><td>Submitted Date</td><td><input type="date" id="txtsubmitted_on_date" name="txtsubmitted_on_date" /></td></tr>
		<tr><td>Status</td><td> <input type="radio" id="radiostatus" name="radiostatus" value="Completed"/> Completed
			   <input type="radio" id="radiostatus" name="radiostatus" value="Continue"/>Continue
		   	   <input type="radio" id="radiostatus" name="radiostatus" value="Approved"/>Approved</td></tr>
		<tr><td>Budget Amount</td><td><input type="text" id="txtbudger_amount" name="txtbudger_amount" /></td></tr>
		<tr><td>Principal Investigator ID</td><td><input type="text" id="txtprincipal_investigator_id" name="txtprincipal_investigator_id" /></td></tr>
		<tr><td>Secondary Investigator ID</td><td><input type="text" id="txtsecondary_investigator_id" name="txtsecondary_investigator_id" /></td></tr>
		<tr><td>Member Name</td><td><input type="text" id="txtmember_name" name="txtmember_name" /></td></tr>
		<tr><td>Remark</td><td><textarea id="txtremark" name="txtremark" rows="1" ></textarea></td></tr>
		<tr><td>API Score</td><td><select id="api_score" name="api_score">
				<option value="0"> 0 </option>
				<option value="1">  1 </option>
				<option value="2">  2 </option>
				<option value="3">  3 </option>
				<option value="4">  4 </option>
				<option value="5">  5 </option>
				<option value="6">  6 </option>
				<option value="7">  7 </option>
				<option value="8">  8 </option>
				<option value="9">  9 </option>
				<option value="10"> 10 </option>
				</select></td></tr>
		<tr><td><input type="submit" id="btnadd" value="Add"/>
		<input type="reset" class="formbutton" id="btnreset" value="Reset" /></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
