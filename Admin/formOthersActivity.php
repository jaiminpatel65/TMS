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
<title> Others Activity </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Add  Others Activity</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Add  Others Activity</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="othersActivity.php" method="post">
					<input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
 	  <tr><td>Activity Name</td><td><input type="text" id="txtactivity_name" name="txtactivity_name" /></td></tr>
	  <tr><td> Activity Type</td> <?php
				include_once('../connect.php');
				$query="select activity_type_id,activity_type from activity_type";
				$query_result=mysql_query($query);
				echo "<td><select id='listEventType' name='listActivityType'>";
				echo "<option value='0'>---</option>";
				while($result=mysql_fetch_array($query_result))
				{
						echo "<option value='".$result['activity_type_id']."'>".$result['activity_type']."</option>";
				}
				echo "</select></td></tr>";
	    ?>
	    <tr><td>Event Type</td>  
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
	    <tr><td>Starting Date</td><td><input type="date" id="txtfromdate" name="txtfromdate" /></td></tr>
	    <tr><td>Ending Date</td><td><input type="date" id="txttodate" name="txttodate" /></td></tr>
	    <tr><td>Organized By</td><td> <input type="text" id="txtorganized_by" name="txtorganized_by" /></td></tr>
        <tr><td>Sponsered By</td><td><input type="text" id="txtsponsered_by" name="txtsponsered_by" /></td></tr>
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
