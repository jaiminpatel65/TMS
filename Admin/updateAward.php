<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$award_id=$_GET['award_id'];
if($award_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from award where award_id=".$award_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Award</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Award</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">

<form action="saveAward.php" method="post">
<input type="hidden" id="txtId" name="txtId" value="<?php echo $award_id; ?>">
<tr><td>Award Name</td><td> <input type="text" name="txtAwardName" id="txtAwardName" value="<?php echo $result['award_name']; ?>"> </td></tr>
<tr><td>Award for Activity </td><td><input type="text" name="txtAwardActivity" id="txtAwardActivity" value="<?php echo $result['award_for_activity']; ?>"> </td></tr>
<tr><td>Award Amount</td><td> <input type="text" name="txtAwardAmount" id="txtAwardAmount" value="<?php echo $result['award_amount']; ?>"></td></tr>
<tr><td>Event Title </td><td><input type="text" name="txtEventTitle" id="txtEventTitle" value="<?php echo $result['event_title']; ?>"></td></tr>

<tr><td>Event Level</td><td>
<select id="listEventLevel" name="listEventLevel">
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
<tr><td> Event type </td><td>
<select id="listEventType" name="listEventType">
	<option value="0"> -- </option>
<?php
$temp="select * from event_type ";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['event_type_id']."'>".$rTemp['event_name']."</option>";
}
?>
</select></td></tr>
<tr><td>Date </td><td> <input type="date" name="txtDate" id="txtDate" value="<?php echo $result['date']; ?>"></td></tr>
<tr><td>Organized By </td><td><input type="text" id="txtOrganized" name="txtOrganized" value="<?php echo $result['organized_by']; ?>"> </td></tr>
<tr><td>Sponsored By </td><td> <input type="text" id="txtSponsored" name="txtSponsored" value="<?php echo $result['sponsored_by']; ?>"></td></tr>
<tr><td>Address </td><td><textarea id="txtAddress" name="txtAddress"><?php echo $result['location']; ?></textarea></td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>