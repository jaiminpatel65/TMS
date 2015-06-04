<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$employee_experience_id=$_GET['employee_experience_id'];
if($employee_experience_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from employee_experience where employee_experience_id=".$employee_experience_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Employee Experience</h4>
<article class="module width_full">
<header><h3 class="tabs_involved">Update Employee Experience</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="saveExperience.php" method="post">
<input type="hidden" id="txtId" name="txtId" value="<?php echo $employee_experience_id; ?>">
<tr><td>Organization Name</td><td><input type="text" id="txtOrgName" name="txtOrgName" value="<?php echo $result['organization_name']; ?>"></td></tr>
<tr><td>Address</td><td><textarea id="txtAddress" name="txtAddress"><?php echo $result['address']; ?></textarea></td></tr>
<tr><td>Pincode</td><td><input type="text" id="txtPincode" name="txtpincode" value="<?php echo $result['pin_code']; ?>"></td></tr>
<tr><td>Phone No.</td><td> <input type="text" name="txtPhoneNo" id="txtPhoneNo" value="<?php echo $result['phone_no']; ?>"></td></tr>
<tr><td>Email ID</td><td> <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $result['email_id']; ?>"></td></tr>
<tr><td>Website Name</td><td> <input type="text" name="txtWebsite" id="txtWebsite" value="<?php echo $result['website_name']; ?>"></td></tr>
<tr><td>Type of Experience</td><td>
<select id="listExperience" name="listExperience">
	<option value="0"> -- </option>
<?php
$temp="select * from type_of_experience";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['type_of_experience_id']."'>".$rTemp['type']."</option>";
}
?>
</select></td></tr>

<tr><td>Type Of Nature Of Work</td><td> 
<select id="listNatureWork" name="listNatureWork">
	<option value="0"> -- </option>
<?php
$temp="select * from types_of_nature_of_work";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['type_of_nature_of_work_id']."'>".$rTemp['type_of_nature_of_work']."</option>";
}
?>
</select></td></tr>

<tr><td>No of Months</td><td> <input type="text" name="txtMonth" id="txtMonth" value="<?php echo $result['no_of_months']; ?>"></td></tr>
<tr><td>Designation</td><td> 
<select id="listDesignation" name="listDesignation">
	<option value="0"> -- </option>
<?php
$temp="select * from designation";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['designation_id']."'>".$rTemp['designation_name']."</option>";
}
?>
</select></td></tr>

<tr><td>Monthly Salary</td><td> <input type="text" name="txtSalary" id="txtSalary" value="<?php echo $result['gross_monthly_salary']; ?>"></td></tr>
<tr><td>Joining Date</td><td> <input type="date" name="txtJoinDate" id="txtJoinDate" value="<?php echo $result['joining_date']; ?>"> </td></tr>
<tr><td>Leavind Date </td><td><input type="date" name="txtLeavingDate" id="txtLeavingDate" value="<?php echo $result['leavin_date']; ?>"></td></tr>
<tr><td>Reason of Leaving </td><td><input type="text" name="txtReason" id="txtReason" value="<?php echo $result['reason_of_leaving']; ?>"></td></tr>
<tr><td>
<input type="submit" name="btnSave" name="btnSave" value="Save"> <input type="reset" class="formbutton" value="Cancal"></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body> 
</html>