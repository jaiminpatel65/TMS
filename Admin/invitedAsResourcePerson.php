<?php
		include_once('../connect.php');
		
		if(isset($_POST['txttitle_of_event']) || isset($_POST['listEventType']) || isset($_POST['listNatureWork']) || isset($_POST['txtorganized_by']) || isset($_POST['txtsponsered_by']) || isset($_POST['txtdate']) || isset($_POST['txtlocation']))
{		
		$toe=$_POST['txttitle_of_event'];
		$etid=$_POST['listEventType'];
		$tonwid=$_POST['listNatureWork'];
		$orgby=$_POST['txtorganized_by'];
		$spby=$_POST['txtsponsered_by'];
		$date=$_POST['txtdate'];
		$location=$_POST['txtlocation'];
		$eid=$_POST['employeeId'];
		
}
else
{
	 	header('Location:../Admin/formInvitedAsResourcePerson.php'); 
}
if(($toe!="") || ($etid!="") || ($tonwid!="") || ($orgby!="") || ($spby!="") || ($date!="") || ($location!="")) 
{
						
			
		$query="INSERT INTO invited_as_resource_person(`invited_as_resource_person`, `employee_id`, `event_name`, `event_type_id`, `type_of_nature_of_work_id`, `organized_by`, `sponsored`, `location`, `date`) VALUES (NULL, '".$eid."','".$toe."','".$etid."','".$tonwid."','".$orgby."','".$spby."','".$location."','".$date."' )";

		$query_result=mysql_query($query);
		
}
else
{
       header('Location:../Admin/formInvitedAsResourcePerson.php'); 
}

?>