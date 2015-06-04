<?php
		include_once('../connect.php');
		
		if(isset($_POST['txtlacture_subject']) || isset($_POST['txttitle_of_event']) || isset($_POST['listEventType']) || isset($_POST['listEventLevel']) || isset($_POST['txtorganized_by']) || isset($_POST['txtsponsered_by']) || isset($_POST['txtdate']) || isset($_POST['txtlocation']) || isset($_POST['api_score']))
{		
		$lecsub=$_POST['txtlacture_subject'];
		$toe=$_POST['txttitle_of_event'];
		$etid=$_POST['listEventType'];
		$elid=$_POST['listEventLevel'];
		$orgby=$_POST['txtorganized_by'];
		$spby=$_POST['txtsponsered_by'];
		$date=$_POST['txtdate'];
		$location=$_POST['txtlocation'];
		$apiscore=$_POST['api_score'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formDeliveredLactures.php'); 
}
if(($lecsub!="") || ($toe!="") || ($etid!="") || ($elid!="") || ($orgby!="") || ($spby!="") || ($date!="") || ($location!="")) 
{
						
			
		$query="INSERT INTO delivered_lectures (`delivered_lectures_id` ,`employee_id` ,`lecture_subject` ,`event_title` ,`event_type_id` ,`date` ,`organized_by` ,`sponsored_by` ,`event_level_id` ,`location` ,`API_score`)VALUES (NULL ,  '".$eid."', '".$lecsub."','".$toe."','".$etid."','".$date."','".$orgby."','".$spby."','".$elid."','".$location."','".$apiscore."')";

		$query_result=mysql_query($query);
		
}
else
{
        header('Location:../Admin/formDeliveredLactures.php'); 
}

?>