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
<title> Membership </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Add Membership</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Add Membership</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="employeeMembership.php" method="post">
                        <input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
 	   <tr><td>Organization Name</td><td><input type="text" id="txtorganize_name" name="txtorganize_name" /></td></tr>
	   <tr><td>Organization Type</td><td><input type="text" id="txtorganize_type" name="txtorganize_type" /></td></tr> 
	   <tr><td>Nature of Work</td> 
	   <?php
				include_once('../connect.php');
				$query="select type_of_nature_of_work_id,type_of_nature_of_work from types_of_nature_of_work";
				$query_result=mysql_query($query);
				echo "<td><select id='listNatureWork' name='listNatureWork'>";
				echo "<option value='0'>---</option>";
				while($result=mysql_fetch_array($query_result))
				{
						echo "<option value='".$result['type_of_nature_of_work_id']."'>".$result['type_of_nature_of_work']."</option>";
				}
				echo "</select></td></tr>";
		?>
	   <tr><td>Starting Date</td><td><input type="date" id="txtfromdate" name="txtfromdate" /></td></tr>
	   <tr><td>Ending Date</td><td><input type="date" id="txttodate" name="txttodate" /></td></tr>
	   <tr><td><input type="submit" id="btnadd" value="Add"/>
	   <input type="reset" class="formbutton" id="btnreset" value="Reset"/></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
