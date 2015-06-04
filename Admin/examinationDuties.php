<?php
		include_once('../connect.php');
		
		if(isset($_POST['listTypeOfExaminationDuty']) || isset($_POST['txtexamination_body']) || isset($_POST['txtinstitute_name']) || isset($_POST['txtdate']) || isset($_POST['txtlocation']))
{		
		$tedid=$_POST['listTypeOfExaminationDuty'];
		$ebody=$_POST['txtexamination_body'];
		$inm=$_POST['txtinstitute_name'];
		$date=$_POST['txtdate'];
		$location=$_POST['txtlocation'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formExaminationDuties.php'); 
}
if(($tedid!="") || ($ebody!="") || ($inm!="") ||($date!="") || ($location!="")) 
{
						
			
		$query="INSERT INTO examination_duties (`examination_duties_id` ,`employee_id` ,`type_of_examination_duty_id` ,`date` ,`examination_body` ,`institute_name` ,`location`)VALUES (NULL ,  '".$eid."',  '".$tedid."','".$date."','".$ebody."','".$inm."','".$location."')";

		$query_result=mysql_query($query);
		
}
else
{
       header('Location:../Admin/formExaminationDuties.php'); 
}

?>