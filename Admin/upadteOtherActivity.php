<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$activity_id=$_GET['activity_id'];
if($activity_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from other_activity where activity_id=".$activity_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Other Activity</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Other Activity</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="saveOtherActivity.php" method="post">
<input type="hidden" id="txtId" name="txtId" value="<?php echo $activity_id; ?>">
<tr><td>Activity Name</td><td> <input type="text" name="txtActivityName" id="txtActivityName" value="<?php echo $result['activity_name']; ?>"></td></tr>
<tr><td>Activity Type</td><td> 
<select id="listActivity" name="listActivity">
	<option value="0"> -- </option>
<?php
$temp="select * from activity_type ";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['activity_type_id']."'>".$rTemp['activity_type']."</option>";
}
?>
</select></td></tr>
<tr><td>Event Level </td><td>
<select id="listLevel" name="listLevel">
	<option value="0"> -- </option>
<?php
$temp="select * from event_level  ";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['event_level_id']."'>".$rTemp['event_level']."</option>";
}
?>
</select></td></tr>
<tr><td>Organized By </td><td> <input type="text" name="txtOrganized" id="txtOrganized" value="<?php echo $result['organized_by']; ?>"></td></tr>
<tr><td>Sponsored By </td><td> <input type="text" name="txtSponsored" id="txtSponsored" value="<?php echo $result['sponsored_by']; ?>"></td></tr>
<tr><td>Address</td><td> <textarea id="txtAddress" name="txtAddress"><?php echo $result['loaction']; ?></textarea></td></tr>
<tr><td>Type of Nature Of Work </td><td>
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
<tr><td>From Date </td><td> <input type="date" id="txtFromDate" name="txtFromDate" value="<?php echo $result['from_date']; ?>"></td></tr>
<tr><td>TO Date </td><td><input type="date" id="txtToDate" name="txtToDate" value="<?php echo $result['to_date']; ?>"></td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>