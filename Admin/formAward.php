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
<title> Award </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Add Award</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Add Award</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="award.php" method="post">
				  <input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
 	  <tr><td> Award Name</td> <td><input type="text" id="txtaward_name" name="txtaward_name" /></td></tr>
	 <tr><td> Award for Activity</td><td><input type="text" id="txtaward_for_activity" name="txtaward_for_activity" /></td></tr>
	  <tr><td> Award Amount</td><td><input type="text" id="txtaward_amount" name="txtaward_amount" /></td></tr>
	 <tr><td>Event Title</td><td><input type="text" id="txtevent_title" name="txtevent_title" /></td></tr>
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
	    <tr><td>Event Level</td> 
		<?php
				include_once('../connect.php');
				$query="select event_level_id,event_level from event_level";
				$query_result=mysql_query($query);
				echo "<td><select id='listEventLevel' name='listEventLevel'>";
				echo "<option value='0'>---</option>";
				while($result=mysql_fetch_array($query_result))
				{
						echo "<option value='".$result['event_level_id']."'>".$result['event_level']."</option>";
				}
				echo "</select></td></tr>";
	   ?>
	   <tr><td>Date</td><td><input type="date" id="txtdate" name="txtdate" /></td></tr>
	   <tr><td>Organized By</td><td><input type="text" id="txtorganized_by" name="txtorganized_by" /></td></tr>
       <tr><td>Sponsered By</td><td><input type="text" id="txtsponsered_by" name="txtsponsered_by" /></td></tr>
	   <tr><td>Location/Address</td><td><textarea id="txtlocation" name="txtlocation" rows="1" ></textarea></td></tr>
       <tr><td><input type="submit" id="btnadd" value="Add"/>
	   <input type="reset" class="formbutton" id="btnreset" value="Reset"/></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
