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
<title> Meeting Attended </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Add Meeting Attended</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Add Meeting Attended</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="meetingAttended.php" method="post">
	<input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
	<tr><td>Organized By</td><td><input type="text" id="txtorganized_by" name="txtorganized_by" /></td></tr>
	<tr><td>Loaction/Address</td><td><textarea id="txtlocation" name="txtlocation"></textarea></td></tr>
	<tr><td>Meeting Agenda</td><td><textarea id="txtmeeting_agenda" name="txtmeeting_agenda"></textarea></td></tr>
	<tr><td>Date</td><td><input type="date" id="txtdate" name="txtdate" /></td></tr>
	<tr><td>Time Duration</td><td><select id="duration_in_hours" name="duration_in_hours" >
				 <option value="0"> HH </option>
				 <option value="0"> 00 </option>
				 <option value="1"> 01 </option>
				 <option value="2"> 02 </option>
				 <option value="3"> 03 </option>
				 <option value="4"> 04 </option>
				 <option value="5"> 05 </option>
				 <option value="6"> 06 </option>
				 <option value="7"> 07 </option>
				 <option value="8"> 08 </option>
				 <option value="9"> 09 </option>
				 <option value="10"> 10 </option>
				 <option value="11"> 11 </option>
				 <option value="12"> 12</option>
				</select>
			 
				 <select id="duration_in_minutes" name="duration_in_minutes" >
				 <option value="0"> MM </option>
				 <option value="0"> 00 </option>
				 <option value="1"> 01 </option>
				 <option value="2"> 02 </option>
				 <option value="3"> 03 </option>
				 <option value="4"> 04 </option>
				 <option value="5"> 05 </option>
				 <option value="6"> 06 </option>
				 <option value="7"> 07 </option>
				 <option value="8"> 08 </option>
				 <option value="9"> 09 </option>
				 <option value="10"> 10 </option>
				 <option value="11"> 11 </option>
				 <option value="12"> 12 </option>
				 <option value="13"> 13 </option>
				 <option value="14"> 14 </option>
				 <option value="15"> 15 </option>
				 <option value="16"> 16 </option>
				 <option value="17"> 17 </option>
				 <option value="18"> 18 </option>
				 <option value="19"> 19 </option>
				 <option value="20"> 20 </option>
				 <option value="21"> 21 </option>
				 <option value="22"> 22 </option>
				 <option value="23"> 23 </option>
				 <option value="24"> 24 </option>
				 <option value="25"> 25</option>				
				 <option value="26"> 26 </option>
				 <option value="27"> 27 </option>
				 <option value="28"> 28 </option>
				 <option value="29"> 29 </option>
				 <option value="30"> 30 </option>
				 <option value="31"> 31 </option>
				 <option value="32"> 32 </option>
				 <option value="33"> 33 </option>
				 <option value="34"> 34 </option>
				 <option value="35"> 35 </option>
				 <option value="36"> 36 </option>
				 <option value="37"> 37 </option>
				 <option value="38"> 38</option>
				 <option value="39"> 39 </option>
				 <option value="40"> 40 </option>
				 <option value="41"> 41 </option>
				 <option value="42"> 42 </option>
				 <option value="43"> 43 </option>
				 <option value="44"> 44 </option>
				 <option value="45"> 45</option>				
				 <option value="46"> 46 </option>
				 <option value="47"> 47 </option>
				 <option value="48"> 48 </option>
				 <option value="49"> 49 </option>
				 <option value="50"> 50 </option>
				 <option value="51"> 51 </option>
				 <option value="52"> 52 </option>
				 <option value="53"> 53 </option>
				 <option value="54"> 54 </option>
				 <option value="55"> 55 </option>
				 <option value="56"> 56 </option>
				 <option value="57"> 57 </option>
				 <option value="58"> 58</option>
				 <option value="59"> 59</option>
				</select></td></tr>
	<tr><td><input type="submit" id="btnadd" value="Add"/>
	<input type="reset" class="formbutton" id="btnreset" value="Reset" /></td></tr>
	
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
