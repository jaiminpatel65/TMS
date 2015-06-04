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
<title> Invited as Resource Person </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Add Invited as Resource Person</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Add Invited as Resource Person</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="invitedAsResourcePerson.php" method="post">
				  <input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
 	   <tr><td>Event Title</td><td><input type="text" id="txttitle_of_event" name="txttitle_of_event" /></td></tr>
	  <tr><td> Event Type </td>
	   <?php
				include_once('../connect.php');
				$query="select event_type_id,event_name from event_type";
				$query_result=mysql_query($query);
				echo "<td><select id='listEventType' name='listEventType'>";
				echo "<option value='0'>---</option>";
				while($result=mysql_fetch_array($query_result))
				{
						echo "<option value='".$result['event_type_id']."'>".$result['event_name']."</option>";
				}
				echo "</select></td></tr>";
	   ?>
	   
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
	
	<tr><td> Date</td><td><input type="date" id="txtdate" name="txtdate" /></td></tr>
	   <tr><td>Organized By </td><td><input type="text" id="txtorganized_by" name="txtorganized_by" /></td></tr>
  <tr><td>Sponsered By</td><td><input type="text" id="txtsponsered_by" name="txtsponsered_by" /></td></tr>
	 <tr><td>Location</td><td><textarea id="txtlocation" name="txtlocation" rows="1" ></textarea></td></tr>
	<tr><td> <input type="submit" id="btnadd" value="Add"/>
	   <input type="reset" class="formbutton" id="btnreset" value="Reset"/></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
