<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$research_project_id=$_GET['research_project_id'];
if($research_project_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from research_project where research_project_id=".$research_project_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Research Project</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Research Project</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="saveResearchProject.php" method="post"> 
<input type="hidden" id="txtId" name="txtId" value="<?php echo $research_project_id; ?>">
<tr><td>Project Title</td><td><input type="text" name="txtProjectTitle" id="txtProjectTitle" value="<?php echo $result['project_title']; ?>"></td></tr>
<tr><td>Submitted To Body Funding Agency</td><td> <input type="text" name="txtSubmittedBody" id="txtSubmittedBody" value="<?php echo $result['submitted_to_body_funding_agency']; ?>"></td></tr>
<tr><td>Submitted Date</td><td> <input type="date" name="txtSubmitDate" id="txtSubmitDate" value="<?php echo $result['submitted_on_date']; ?>"></td></tr>
<tr><td>Approved Date</td><td> <input type="date" name="txtApprovedDate" id="txtApprovedDate" value="<?php echo $result['approved_date']; ?>"></td></tr>
<tr><td>Start Date</td><td> <input type="date" name="txtStartDate" id="txtStartDate" value="<?php echo $result['start_date']; ?>"></td></tr>
<tr><td>Completion Date</td><td> <input type="date" name="txtCompletionDate" id="txtCompletionDate" value="<?php echo $result['completion_date']; ?>"></td></tr>
<tr><td>Status</td><td> <input type="text" name="txtStatus" id="txtStatus" value="<?php echo $result['status']; ?>"></td></tr>
<tr><td>Budger Amount </td><td> <input type="text" name="txtAmount" id="txtAmount" value="<?php echo $result['budger_amount']; ?>"></td></tr>
<tr><td>Member Name</td><td> <input type="text" name="txtMemberName" id="txtMemberName" value="<?php echo $result['member_name']; ?>"></td></tr>
<tr><td>Remark</td><td> <input type="text" name="txtRemark" id="txtRemark" value="<?php echo $result['remark']; ?>"></td></tr>
<tr><td>API Score</td><td> <input type="text" name="txtAPIScore" id="txtAPIScore" value="<?php echo $result['API_score']; ?>"></td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form> 
</table>
		</div>
</article>
</section> 
</body>
</html>