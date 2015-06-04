<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$examination_duties_id=$_GET['examination_duties_id'];
if($examination_duties_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from examination_duties where examination_duties_id=".$examination_duties_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Examination Duties</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Examination Duties</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="saveExaminationDuties.php" method="post">
<input type="hidden" id="txtId" name="txtId" value="<?php echo $examination_duties_id; ?>">
<tr><td>Type of Examination Duty</td><td>
<select id="listNatureWork" name="listNatureWork">
	<option value="0"> -- </option>
<?php
$temp="select * from type_of_examination_duty";
$temp=mysql_query($temp);
while($rTemp=mysql_fetch_array($temp))
{
	echo "<option value='".$rTemp['type_of_examination_duty_id']."'>".$rTemp['type_of_examination_duty']."</option>";
}
?>
</select></td></tr>
<tr><td>Date</td><td> <input type="date" name="txtDate" id="txtDate" value="<?php echo $result['date']; ?>"></td></tr>
<tr><td>Examination Body</td><td> <input type="text" name="txtExaminationBody" id="txtExaminationBody" value="<?php echo $result['examination_body']; ?>"></td></tr>
<tr><td>Institute Name </td><td><input type="text" name="txtInstituteName" id="txtInstituteName" value="<?php echo $result['institute_name']; ?>"></td></tr>
<tr><td>Address </td><td> <textarea name="txtAddress" id="txtAddress" ><?php echo $result['location']; ?></textarea></td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>