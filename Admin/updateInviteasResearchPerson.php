<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$invited_as_resource_person=$_GET['invited_as_resource_person'];
if($invited_as_resource_person==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from invited_as_resource_person where invited_as_resource_person=".$invited_as_resource_person;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Inviteas As Research Person</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Inviteas As Research Person</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="saveInviteasResearchPerson.php" method="post">
<input type="hidden" id="txtId" name="txtId" value="<?php echo $invited_as_resource_person; ?>">
<tr><td>Event Name </td><td><input type="text" id="txtEventName" name="txtEventName" value="<?php echo $result['event_name']; ?>"></td></tr>
<tr><td>Event Type</td><td> 
<select id="listEventLevel" name="listEventType">
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
<tr><td>Type of Nature Of Work </td><td> 
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
<tr><td>Organized By </td><td> <input type="text" name="txtOrganized" id="txtOrganized" value="<?php echo $result['organized_by']; ?>" ></td></tr>
<tr><td>Sponsored By </td><td> <input type="text" name="txtSponsored" id="txtSponsored" value="<?php echo $result['sponsored']; ?>" ></td></tr>
<tr><td>Address</td><td> <textarea id="txtAddress" name="txtAddress"><?php echo $result['location']; ?></textarea></td></tr>
<tr><td>Date </td><td><input type="date" id="txtDate" name="txtDate" value="<?php echo $result['date']; ?>"></td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>