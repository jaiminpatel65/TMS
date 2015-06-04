<?php
		include_once('../connect.php');
		
		if(isset($_POST['txttitle_of_event']) || isset($_POST['listEventType']) || isset($_POST['txtorganized_by']) || isset($_POST['txtsponsered_by']) || isset($_POST['txtfromdate				']) || isset($_POST['txttodate']) || isset($_POST['txtlocation']) || isset($_POST['api_score']))
{		
		$toe=$_POST['txttitle_of_event'];
		$etid=$_POST['listEventType'];
		$orgby=$_POST['txtorganized_by'];
		$spby=$_POST['txtsponsered_by'];
		$fdate=$_POST['txtfromdate'];
		$tdate=$_POST['txttodate'];
		$location=$_POST['txtlocation'];
		$apiscore=$_POST['api_score'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formEmployeeParticipation.php'); 
}
if(($toe!="") || ($etid!="") || ($orgby!="") || ($spby!="") || ($fdate!="") || ($tdate!="") || ($location!="")) 
{
						
			
		$query="INSERT INTO employee_participation (`employee_participation_id` ,`employee_id` ,`event_title_subject` ,`event_type_id` ,`from_date` ,`to_date` ,`organized_by` ,`sponsored_by` ,`location_address` ,`API_score`)VALUES (NULL ,  '".$eid."', '".$toe."','".$etid."','".$fdate."','".$tdate."','".$orgby."','".$spby."','".$location."','".$apiscore."')";

		$query_result=mysql_query($query);
		
}
else
{
	 header('Location:../Admin/formEmployeeParticipation.php'); 
}

?>