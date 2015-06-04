<?php
		include_once('../connect.php');
		
	if(isset($_POST['txtorganized_by']) || isset($_POST['txtlocation']) || isset($_POST['txtfrom']) || isset($_POST['txtto']) || isset($_POST['txtdate']) || isset($_POST['duration_in_minutes']) || isset($_POST['duration_in_hours']))
{		

		$orgby=$_POST['txtorganized_by'];
		$location=$_POST['txtlocation'];
		$magenda=$_POST['txtmeeting_agenda'];
		$date=$_POST['txtdate'];
		$hours=$_POST['duration_in_hours'];
		$minutes=$_POST['duration_in_minutes'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formMeetingAttended.php'); 
}
if(($orgby!="") || ($location!="") || ($magenda!="") || ($date!="") || ($duration!="")) 
{
		
			$duration=($hours*60) + $minutes;
		$query="INSERT INTO meeting_attended (`meeting_attended_id` ,`employee_id` ,`location_address` ,`meeting_agenda` ,`date` ,`duration_in_minutes` ,`organized_by`)VALUES (NULL ,  '".$eid."','".$location."','".$magenda."','".$date."','".$duration."','".$orgby."')";
		
		$query_result=mysql_query($query);
		
		
}
else
{
	 	 	header('Location:../Admin/formMeetingAttended.php'); 
}

?>