<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$employee_membership_id=$_GET['employee_membership_id'];
if($employee_membership_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from employee_membership where employee_membership_id=".$employee_membership_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Employee Qulification Membership</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Employee Membership</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="aveEmployeeMembership.php" method="post" >
<input type="hidden" id="txtId" name="txtId" value="<?php echo $employee_membership_id; ?>">
<tr><td>Organization Name</td><td> <input type="text" name="txtName" id="txtName" value="<?php echo $result['organization_name']; ?>"></td></tr>
<tr><td>Organization Type </td><td><input type="text" name="txtOrganizationType" id="txtOrganizationType"  value="<?php echo $result['organization_type']; ?>"></td></tr>
<tr><td>Type Nature of Work </td><td>
<select id="listTypeNatureWork" name="listTypeNatureWork">
	<option value="0"> -- </option>
<?php
$temp="select * from types_of_nature_of_work  ";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['type_of_nature_of_work_id']."'>".$rTemp['type_of_nature_of_work']."</option>";
}
?>
</select></td></tr>
<tr><td>From Date</td><td><input type="date" id="txtFromDate" name="txtFromDate" value="<?php echo $result['from_date']; ?>"></td></tr>
<tr><td>To Date</td><td> <input type="date" id="txtTodate" name="txtToDate" value="<?php echo $result['to_date']; ?>"> </td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>