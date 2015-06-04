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
<title> Examination Duties </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Examination Duties</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Examination Duties</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="examinationDuties.php" method="post">
	   <input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
 	  <tr><td> Type of Examination Duty </td> 
	   <?php
				include_once('../connect.php');
				$query="select type_of_examination_duty_id,type_of_examination_duty from type_of_examination_duty";
				$query_result=mysql_query($query);
				echo "<td><select id='listTypeOfExaminationDuty' name='listTypeOfExaminationDuty'>";
				echo "<option value='0'>---</option>";
				while($result=mysql_fetch_array($query_result))
				{
						echo "<option value='".$result['type_of_examination_duty_id']."'>".$result['type_of_examination_duty']."</option>";
				}
				echo "</select></td></tr>";
		?>
	   <tr><td>Date</td><td><input type="date" id="txtdate" name="txtdate" /></td></tr>
	   <tr><td>Examination Body</td><td><input type="text" id="txtexamination_body" name="txtexamination_body" /></td></tr>
       <tr><td>Institute Name</td><td><input type="text" id="txtinstitute_name" name="txtinstitute_name" /></td></tr>
	  <tr><td>Location</td><td><textarea id="txtlocation" name="txtlocation" rows="1" ></textarea></td></tr>
       <tr><td><input type="submit" id="btnadd" value="Add"/>
	   <input type="reset" class="formbutton" id="btnreset" value="Reset"/></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
