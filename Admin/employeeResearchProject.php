<?php
		include_once('../connect.php');
if(isset($_POST['txtproject_title']) || isset($_POST['txtsubmitted_to_body_funding_agency']) || isset($_POST['txtsubmitted_on_date']) || isset($_POST['txtapproved_date']) || isset($_POST['txtstart_date']) || isset($_POST['txtcomplition_date']) || isset($_POST['radiostatus']) || isset($_POST['txtbudger_amount'])|| isset($_POST['txtprincipal_investigator_id']) ||  isset($_POST['txtsecondary_investigator_id']) || isset($_POST['txtmember_name']) || isset($_POST['txtremark']) || isset($_POST['api_score']))
{		
		$pt=$_POST['txtproject_title'];
		$stbfa=$_POST['txtsubmitted_to_body_funding_agency'];
		$sodt=$_POST['txtsubmitted_on_date'];
		$adt=$_POST['txtapproved_date'];
		$stdt=$_POST['txtstart_date'];
		$codt=$_POST['txtcomplition_date'];
		$status=$_POST['radiostatus'];
		$bamt=$_POST['txtbudger_amount'];
		$piid=$_POST['txtprincipal_investigator_id'];
		$siid=$_POST['txtsecondary_investigator_id'];
		$mnm=$_POST['txtmember_name'];
		$remark=$_POST['txtremark'];
		$apiscore=$_POST['api_score'];
		$eid=$_POST['employeeId'];
}
else
{
	 		 	header('Location:../Admin/formEmployeeResearchProject.php'); 
}
if(($pt!="") || ($stbfa!="") || ($sodt!="") || ($adt!="") || ($stdt!="") || ($codt!="") || ($status!="") || ($bamt!="") || ($piid!="") || ($siid!="") || ($mnm!="") ) 
{
				if($remark=="")
				{
					$remark="NULL";
				}
				$query="INSERT INTO research_project (`research_project_id` ,`employee_id` ,`project_title` ,`submitted_to_body_funding_agency` ,`submitted_on_date` ,`approved_date` ,`start_date` ,`completion_date` ,`status` ,`budger_amount` ,`principal_investigator_id` ,`secondary_investiigator_id` ,`member_name` ,`remark` ,`API_score`)VALUES (NULL ,  '".$eid."',  '".$pt."','".$stbfa."','".$sodt."','".$adt."','".$stdt."','".$codt."','".$status."','".$bamt."','".$piid."','".$siid."','".$mnm."','".$remark."','".$apiscore."')";
				
			$query_result=mysql_query ($query);
		
}
else
{
	 	header('Location:../Admin/formEmployeeResearchProject.php'); 
}
?>

