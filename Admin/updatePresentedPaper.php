<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$employee_presented_paper_id=$_GET['employee_presented_paper_id'];
if($employee_presented_paper_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from employee_presented_paper where employee_presented_paper_id=".$employee_presented_paper_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Present Paper</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Present Paper</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="savePresentedPaper.php" method="post">
<input type="hidden" id="txtId" name="txtId" value="<?php echo $employee_presented_paper_id; ?>">
<tr><td>Title of Presented Paper</td><td><input type="text" name="txtPaperTitle" id="txtPaperTitle" value="<?php echo $result['title_of_presented_paper']; ?>"></td></tr>
<tr><td>Title of Conference Seminar</td><td><input type="text" name="txtTitleSeminar" id="txtTitleSeminar" value="<?php echo $result['title_of_conference_seminar']; ?>"></td></tr>
<tr><td>Organized By</td><td><input type="text" name="txtOrganized" id="txtOrganized" value="<?php echo $result['organized_by']; ?>"></td></tr>
<tr><td>Sponsored By</td><td><input type="text" name="txtSponsored" id="txtSponsored" value="<?php echo $result['sponsored_by']; ?>"></td></tr>
<tr><td>Date : <input type="date" name="txtDate" id="txtDate" value="<?php echo $result['date']; ?>"></td></tr>
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
<tr><td>Event Type </td><td>
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
<tr><td>Co-Auther</td><td> <input type="text" name="txtCoAuther" id="txtCoAuther" value="<?php echo $result['co_author']; ?>"></td></tr>
<tr><td>Rank If Any </td><td><input type="text" name="txtRank" id="txtRank" value="<?php echo $result['rank_if_any']; ?>"></td></tr>
<tr><td>API Score</td><td> <input type="text" name="txtAPIScore" id="txtAPIScore" value="<?php echo $result['API_score']; ?>"></td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form> 
</table>
		</div>
</article>
</section>
</body>
</html>