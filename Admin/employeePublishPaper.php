
<?php
		include_once('../connect.php');
if(isset($_POST['txttitle_of_reasearch_paper']) || isset($_POST['txtname_of_journal_conference_procedding']) || isset($_POST['listEventLevel']) || isset($_POST['txtissn_no']) || isset($_POST['txtvolume_no']) || isset($_POST['txtissue_no']) || isset($_POST['txtpage_no']) || isset($_POST['listEventType'])|| isset($_POST['txtdate_of_publication']) ||  isset($_POST['txtname_of_co_authors']) || isset($_POST['api_score']))
{		
		$trp=$_POST['txttitle_of_reasearch_paper'];
		$njcp=$_POST['txtname_of_journal_conference_procedding'];
		$elid=$_POST['listEventLevel'];
		$issnno=$_POST['txtissn_no'];
		$volumeno=$_POST['txtvolume_no'];
		$issueno=$_POST['txtissue_no'];
		$pageno=$_POST['txtpage_no'];
		$etid=$_POST['listEventType'];
		$dop=$_POST['txtdate_of_publication'];
		$nca=$_POST['txtname_of_co_authors'];
		$apiscore=$_POST['api_score'];
		$eid=$_POST['employeeId'];
}
else
{
	 		 	header('Location:../Admin/formEmployeePublishPaper.php'); 
}
if(($trp!="") || ($njcp!="") || ($elid!="") || ($issnno!="") || ($volumeno!="") || ($issueno!="") || ($pageno!="") || ($etid!="") || ($dop!="") || ($nca!="") ) 
{
				$query="INSERT INTO employee_published_paper (`employee_publication_id` ,`employee_id` ,`title_of_research_paper` ,`name_of_journal_conference_proceeding` ,`event_level_id` ,`ISSN_no` ,`volume_no` ,`issue_no` ,`page_no` ,`event_type_id` ,`date_of_publication` ,`name_of_co_authors` ,`API_score`) VALUES (
NULL ,  '".$eid."',  '".$trp."','".$njcp."','".$elid."','".$issnno."','".$volumeno."','".$issueno."','".$pageno."','".$etid."','".$dop."','".$nca."','".$apiscore."')";
	
		$query_result=mysql_query ($query);
		
}
else
{
	 	header('Location:../Admin/formEmployeePublishPaper.php'); 
}

		

?>

