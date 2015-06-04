<?php
		include_once('../connect.php');
		
		if(isset($_POST['txtorganize_name']) || isset($_POST['txtorganize_type']) || isset($_POST['listNatureWork']) || isset($_POST['txtfromdate']) || isset($_POST['txttodate']))
{		
		$orgnm=$_POST['txtorganize_name'];
		$orgtype=$_POST['txtorganize_type'];
		$tonwid=$_POST['listNatureWork'];
		$fromdt=$_POST['txtfromdate'];
		$todt=$_POST['txttodate'];
		$eid=$_POST['employeeId'];		
}
else
{
	 	header('Location:../Admin/formEmployeeMembership.php'); 
}
if(($orgnm!="") || ($orgtype!="") || ($tonwid=="") || ($fromdt!="") || ($todt!="")) 
{							
		$query="INSERT INTO employee_membership (`employee_membership_id`, `employee_id`, `organization_name`, `organization_type`, `type_of_nature_of_work_id`, `from_date`, `to_date`) VALUES (NULL, '".$eid."', '".$orgnm."', '".$orgtype."', '".$tonwid."', '".$fromdt."', '".$todt."')";
		$query_result=mysql_query($query);		
		
}
else
{
      header('Location:../Admin/formEmployeeMembership.php'); 
}
?>