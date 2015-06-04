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
<title> Presented Paper </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Add Presented Paper</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Add Presented Paper</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="employeePresentedPaper.php" method="post">

		<input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
 	    <tr><td>Title of Presented Paper</td><td><input type="text" id="txttitle_of_presented_paper" name="txttitle_of_presented_paper" /></td></tr>
	  <tr><td>Name of Conference/Seminar</td><td><input type="text" id="txttitle_of_conference_seminar" name="txttitle_of_conference_seminar" /></td></tr>
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
	 <tr><td>Co-Author</td><td><input type="text" id="txtco_author" name="txtco_author" /></td></tr>
	<tr><td>Rank if Any</td><td><select id="rank_if_any" name="rank_if_any">
	   			   <option value="">  --- </option>
				   <option value="First Rank"> First Rank </option>
				   <option value="Within Top 3"> Within Top 3</option>
				   <option value="Within Top 10"> Within Top 10 </option>
				   <option value="Others"> Others </option>
				   </select></td></tr>
		<tr><td>API Score</td><td><select id="api_score" name="api_score">
				<option value="0"> 0 </option>
				<option value="1">  1 </option>
				<option value="2">  2 </option>
				<option value="3">  3 </option>
				<option value="4">  4 </option>
				<option value="5">  5 </option>
				<option value="6">  6 </option>
				<option value="7">  7 </option>
				<option value="8">  8 </option>
				<option value="9">  9 </option>
				<option value="10"> 10 </option>
				</select></td></tr>
		<tr><td><input type="submit" id="btnadd" value="Add"/>
		<input type="reset" class="formbutton" id="btnreset" value="Reset"/></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
