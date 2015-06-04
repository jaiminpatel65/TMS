<?php
		include_once('../connect.php');
		
		if(isset($_POST['txtaward_name']) || isset($_POST['txtaward_for_activity']) || isset($_POST['txtaward_amount']) || isset($_POST['listEventType']) || isset($_POST['txtevent_title']) || isset($_POST['listEventLevel']) || isset($_POST['txtorganized_by']) || isset($_POST['txtsponsered_by']) || isset($_POST['txtdate']) || isset($_POST['txtlocation']) )
{		
		$anm=$_POST['txtaward_name'];
		$aactivity=$_POST['txtaward_for_activity'];
		$etid=$_POST['listEventType'];
		$elid=$_POST['listEventLevel'];
		$orgby=$_POST['txtorganized_by'];
		$spby=$_POST['txtsponsered_by'];
		$date=$_POST['txtdate'];
		$location=$_POST['txtlocation'];
		$etitle=$_POST['txtevent_title'];
		$aamt=$_POST['txtaward_amount'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formAward.php'); 
}
if(($anm!="") || ($aactivity!="") || ($etid!="") || ($elid!="") || ($orgby!="") || ($spby!="") || ($date!="") || ($location!="") || ($etitle!="") || ($aamt!="")) 
{
						
			
		$query="INSERT INTO  award (`award_id` ,`employee_id` ,`award_name` ,`award_for_activity` ,`award_amount` ,`event_title` ,`event_type_id` ,`event_level_id` ,`date` ,`organized_by` ,`sponsored_by` ,`location`)VALUES (NULL ,  '".$eid."',  '".$anm."','".$aactivity."','".$aamt."','".$etitle."','".$etid."','".$elid."','".$date."','".$orgby."','".$spby."','".$location."')";

		$query_result=mysql_query($query);
		
}
else
{
        header('Location:../Admin/formAward.php'); 
}

?>