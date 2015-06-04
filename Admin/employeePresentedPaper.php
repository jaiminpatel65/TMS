<?php
		include_once('../connect.php');
		
	if(isset($_POST['txttitle_of_presented_paper']) || isset($_POST['txttitle_of_conference_seminar']) || isset($_POST['txtorganized_by']) || isset($_POST['txtsponsered_by']) || isset($_POST['txtdate']) || isset($_POST['listEventLevel']) || isset($_POST['txtco_author']) || isset($_POST['rank_if_any'])|| isset($_POST['api_score']) ||  isset($_POST['listEventType']))
{		

		$tpp=$_POST['txttitle_of_presented_paper'];
		$tcs=$_POST['txttitle_of_conference_seminar'];
		$orgby=$_POST['txtorganized_by'];
		$spby=$_POST['txtsponsered_by'];
		$date=$_POST['txtdate'];
		$elid=$_POST['listEventLevel'];
		$coauth=$_POST['txtco_author'];
		$rank=$_POST['rank_if_any'];
		$apiscore=$_POST['api_score'];
		$etid=$_POST['listEventType'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formEmployeePresentedPaper.php');
}
if(($tpp!="") || ($tcs!="") || ($orgby!="") || ($spby!="") || ($date!="") || ($elid!="") || ($coauth!="") || ($etid!="") ) 
{
			
		$query="INSERT INTO employee_presented_paper (`employee_presented_paper_id` ,`employee_id` ,`title_of_presented_paper` ,`title_of_conference_seminar` ,`organized_by` ,`sponsored_by` ,`date` ,`event_level_id` ,`co_author` ,`rank_if_any` ,`API_score` ,`event_type_id`) VALUES (NULL ,  '".$eid."',  '".$tpp."','".$tcs."','".$orgby."','".$spby."','".$date."','".$elid."','".$coauth."','".$rank."','".$apiscore."','".$etid."')";

		$query_result=mysql_query($query);
}
else
{
	 	header('Location:../Admin/formEmployeePresentedPaper.php');
}

?>