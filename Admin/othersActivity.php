<?php
		include_once('../connect.php');
		
		if(isset($_POST['txtactivity_name']) || isset($_POST['listActivityType']) || isset($_POST['listEventType']) || isset($_POST['txtorganized_by']) || isset($_POST['txtsponsered_by']) || isset($_POST['txtfromdate']) || isset($_POST['txtlocation']) || isset($_POST['txttodate']) || isset($_POST['listNatureWork']) )
{		
		$aname=$_POST['txtactivity_name'];
		$toa=$_POST['listActivityType'];
		$tonw=$_POST['listNatureWork'];
		$elid=$_POST['listEventType'];
		$orgby=$_POST['txtorganized_by'];
		$spby=$_POST['txtsponsered_by'];
		$fromdate=$_POST['txtfromdate'];
		$location=$_POST['txtlocation'];
		$todate=$_POST['txttodate'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formOthersActivity.php'); 
}
if(($aname!="") || ($toa!="") || ($tonw!="") || ($elid!="") || ($orgby!="") || ($spby!="") || ($fromdate!="") || ($todate!="") || ($location!="")) 
{
						
			
		$query="INSERT INTO other_activity (`activity_id`, `employee_id`, `activity_name`, `activity_type_id`, `event_level_id`, `organized_by`, `sponsored_by`, `loaction`, `type_of_nature_of_work_id`, `from_date`, `to_date`) VALUES (NULL, '".$eid."', '".$aname."','".$toa."','".$elid."','".$orgby."','".$spby."','".$location."','".$tonw."','".$fromdate."','".$todate."')";

		$query_result=mysql_query($query);
		
}
else
{
       header('Location:../Admin/formOthersActivity.php'); 
}

?>