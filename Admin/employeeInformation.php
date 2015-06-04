<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	include_once('logout.php'); 
}
include('hed.php');
?>
<html>
<head>
	<script src="../jquery/jquery-1.1.4.js"></script>
	<script type="text/javascript" >
	$(document).ready(function(){
		$('#tInterest').hide(); var interest=0;
		$("#lInterest").click(function(){
			if(interest%2==0){
				$('#tInterest').show();
				interest++;
			}else{
				$('#tInterest').hide();
				interest++;
			}
		});
		
		$('#dLanguage').hide(); var language=0;
		$("#lLanguage").click(function(){
			if(language%2==0){
				$('#dLanguage').show();
				language++;
			}else{
				$('#dLanguage').hide();
				language++;
			}
		});
		
		$('#tQualification').hide(); $('#mLSupporting').hide(); var qualification=0;
		$("#lQualification").click(function(){
			if(qualification%2==0){
				$('#tQualification').show();
				$('#mLSupporting').show();
				qualification++;
			}else{
				$('#tQualification').hide();
				$('#mLSupporting').hide();
				qualification++;
			}
		});
		
		$('#tSupporting').hide(); var supporting=0;
		$("#lSupporting").click(function(){
			if(supporting%2==0){
				$('#tSupporting').show();
				supporting++;
			}else{
				$('#tSupporting').hide();
				supporting++;
			}
		});

		$('#tExperience').hide(); var experience=0;
		$("#lExperience").click(function(){
			if(experience%2==0){
				$('#tExperience').show();
				experience++;
			}else{
				$('#tExperience').hide();
				experience++;
			}
		});
		
		$('#tPublishedPaper').hide(); var publishedPaper=0;
		$("#lPublishedPaper").click(function(){
			if(publishedPaper%2==0){
				$('#tPublishedPaper').show();
				publishedPaper++;
			}else{
				$('#tPublishedPaper').hide();
				publishedPaper++;
			}
		});
		
		$('#tResearchProject').hide(); var researchProject=0;
		$("#lResearchProject").click(function(){
			if(researchProject%2==0){
				$('#tResearchProject').show();
				researchProject++;
			}else{
				$('#tResearchProject').hide();
				researchProject++;
			}
		});
		
		$('#tPresentedPaper').hide(); var presentedPaper=0;
		$("#lPresentedPaper").click(function(){
			if(presentedPaper%2==0){
				$('#tPresentedPaper').show();
				presentedPaper++;
			}else{
				$('#tPresentedPaper').hide();
				presentedPaper++;
			}
		});
		
		$('#tPulishedBook').hide(); var pulishedBook=0;
		$("#lPulishedBook").click(function(){
			if(pulishedBook%2==0){
				$('#tPulishedBook').show();
				pulishedBook++;
			}else{
				$('#tPulishedBook').hide();
				pulishedBook++;
			}
		});
		
		$('#tParticipation').hide(); var participation=0;
		$("#lParticipation").click(function(){
			if(participation%2==0){
				$('#tParticipation').show();
				participation++;
			}else{
				$('#tParticipation').hide();
				participation++;
			}
		});
		
		$('#tMeeting').hide(); var meeting=0;
		$("#lMeeting").click(function(){
			if(meeting%2==0){
				$('#tMeeting').show();
				meeting++;
			}else{
				$('#tMeeting').hide();
				meeting++;
			}
		});
		
		$('#tDeliveredLectures').hide(); var deliveredLectures=0;
		$("#lDeliveredLectures").click(function(){
			if(deliveredLectures%2==0){
				$('#tDeliveredLectures').show();
				deliveredLectures++;
			}else{
				$('#tDeliveredLectures').hide();
				deliveredLectures++;
			}
		});
		
		$('#tAward').hide(); var award=0;
		$("#lAward").click(function(){
			if(award%2==0){
				$('#tAward').show();
				award++;
			}else{
				$('#tAward').hide();
				award++;
			}
		});
		
		$('#tExaminationDuties').hide(); var examinationDuties=0;
		$("#lExaminationDuties").click(function(){
			if(examinationDuties%2==0){
				$('#tExaminationDuties').show();
				examinationDuties++;
			}else{
				$('#tExaminationDuties').hide();
				examinationDuties++;
			}
		});
		
		$('#tInvitedResource').hide(); var invitedResource=0;
		$("#lInvitedResource").click(function(){
			if(invitedResource%2==0){
				$('#tInvitedResource').show();
				invitedResource++;
			}else{
				$('#tInvitedResource').hide();
				invitedResource++;
			}
		});
		
		$('#tMembership').hide(); var membership=0;
		$("#lMembership").click(function(){
			if(membership%2==0){
				$('#tMembership').show();
				membership++;
			}else{
				$('#tMembership').hide();
				membership++;
			}
		});
		
		$('#tOtherActivity').hide(); var otherActivity=0;
		$("#lOtherActivity").click(function(){
			if(otherActivity%2==0){
				$('#tOtherActivity').show();
				otherActivity++;
			}else{
				$('#tOtherActivity').hide();
				otherActivity++;
			}
		});
	});
	</script>
</head>

<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Employee Information</h4>
<article class="module width_full">
<header><h3 class="tabs_involved">Employee Information</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form id="formDate" action="employeeInformation.php" mathod="get">
	<tr><td><input type="hidden" name="employeeId" value="<?php echo $_GET['employeeId'];?>" /></td>
<td>Date :</td><td> <input type="date" name="txtFromDate" id="txtFromDate" value="<?php if(isset($_GET['txtFromDate']))echo $_GET['txtFromDate'];?>" /></td>
<td> to</td><td> <input type="date" name="txtToDate" id="txtToDate" value="<?php if(isset($_GET['txtToDate']))echo $_GET['txtToDate'];?>"/></td>
	<td><input type="submit" value="Apply"></td></tr>
<form></table></div>
<?php
include_once('../connect.php');
if(isset($_GET['employeeId']))
{
	$id=$_GET['employeeId'];
}else{
	include_once('logout.php');
}
if(isset($_GET['txtFromDate']))
{
	$fromDate=$_GET['txtFromDate'];
}else{
	$fromDate="";
}
if(isset($_GET['txtToDate']))
{
	$toDate=$_GET['txtToDate'];
}else{
	$toDate="";
}
if($id!="")
{
$query="select * from employee where employee_id=".$id;
$query_result=mysql_query($query);
if($result=mysql_fetch_array($query_result))
{
	$temp="select d.department_name,i.institute_name 
		from department d,employee e,institute i where i.institute_id=d.institute_id and e.department_id=d.department_id and e.employee_id=".$id;
	$temp=mysql_query($temp);
	$temp=mysql_fetch_array($temp);
	$department=$temp['department_name'];
	$institute=$temp['institute_name'];
	//echo "<br>Institute/Department Name = " .$institute ." -> ".$department;
	
	$temp="select category from social_category where category_id=".$result['social_category_id'];
	$temp=mysql_query($temp);
	$temp=mysql_fetch_array($temp);
	$category=$temp['category'];
	echo "<header><h3 class='tabs_involved'>Personal Information</h3></header>";
	echo "<div id='tab1' class='tab_content'>";
	echo "<table class='tablesorter' cellspacing='0'> ";
	echo "<tr><td>Name</td><td>" .$result['name']."</td></tr>";
	echo "<tr><td>Local Address</td><td>".$result['local_address_line1'].", ".$result['local_address_line2'].", ".$result['local_address_line2'].", ".$result['local_area'];
	echo ", ".$result['local_city'];
	echo ", ".$result['loacl_state']." - ".$result['local_pin_code']."</td></tr>";
	echo "<tr><td>Permanent Address</td><td>".$result['permanent_address_line1'].", ".$result['permanent_address_line2'].", ".$result['permanent_address_line2'].", ".$result['permanent_area'];
	echo ", ".$result['permanent_city'];
	echo ", ".$result['permanent_state']." - ".$result['permanent_pin_code']."</td></tr>";
	echo "<tr><td>Date of Birth(yyyy-mm-dd)</td><td>".$result['DOB']."</td></tr>";
	echo "<tr><td>Place of Birth</td><td>".$result['place_of_birth']."</td></tr>";
	echo "<tr><td>Gender</td><td>".$result['gender']."</td></tr>";
	echo "<tr><td>Marital Status</td><td>".$result['marital_status']."</td></tr>";
	echo "<tr><td>Social Category</td><td>".$category."</td></tr>";
	echo "<tr><td>Hobby</td><td>";
	
	$temp="select h.hobby from employee_hobby eh,hobby h where eh.hobby_id=h.hobby_id and eh.employee_id=".$id;
	$temp=mysql_query($temp);
	if($result=mysql_fetch_array($temp))
	{
		echo $result['hobby']."</td></tr>";
		/*while($result=mysql_fetch_array($temp))
		{
			echo "<td>" .$result['hobby']."</td></tr>";
		}*/
	}
	echo "</table></div>";
	//Contact table query display employee contact imformation
	$query="select ct.type,ec.contact_value from employee_contact ec,contact_type ct where ec.contact_type_id=ct.contact_type_id and ec.employee_id=".$id;
	$query_result=mysql_query($query);
	echo "<header><div id='lContact'><h3 class='tabs_involved'>Contact Information</h3></div></header>";
	echo "<div id='tab1' class='tab_content'>";
	echo "<table class='tablesorter' cellspacing='0'> ";
	if($result=mysql_fetch_array($query_result)){
		echo "<tr><td>".$result['type'] ."</td><td>" .$result['contact_value']."</td></tr>";
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr><td>".$result['type']."</td><td>" .$result['contact_value']."</td></tr>";
	}
	}
	echo "</table></div>";
	
	//Language table query display language knonw information
	echo "<header><div id='lLanguage'><h3 class='tabs_involved'>Language Known</h3></div></header>";
	$temp="select el.employee_language_id,l.language_name,el.read_capability,el.speak_capability,el.write_capability,el.examination_pass
 from employee_language el,language l where el.language_id=l.language_id and employee_id=".$id;
	$temp=mysql_query($temp);
	if($result=mysql_fetch_array($temp))
	{
		echo "<div id='dLanguage'>  - ".$result['language_name'];
		echo " (";
		if($result['read_capability']=="yes") echo "Reading";
		if($result['speak_capability']=="yes") echo ", Speaking";
		if($result['write_capability']=="yes") echo ", Writing";
		echo ")";
		while($result=mysql_fetch_array($temp))
		{
			echo "<br>  - ".$result['language_name'];
			echo " (";
			if($result['read_capability']=="yes") echo "Reading";
			if($result['speak_capability']=="yes") echo ", Speaking";
			if($result['write_capability']=="yes") echo ", Writing";
			echo ")";
		}
		echo "</div>";
	}
	//employee interest query.
	$query="select ei.employee_interest_id,it.interest_type,ei.interest_name 
	from employee_interest ei,interest_type it 
	where ei.interest_type_id=it.interest_type_id and ei.employee_id=".$id;
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lInterest'><h3 class='tabs_involved'>Interest</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tInterest' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr><th>No.</th>";
		echo "<th>Interest Subject</th>";
		echo "<th>Area</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['interest_name']."</td>";
		echo "<td>".$result['interest_type']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "<tr>";
		echo "<tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['interest_name']."</td>";
		echo "<td>".$result['interest_type']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "<tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	//employee Qualifiaction display.
	$query="select eq.employee_qualification_id,d.degree_name,
	eq.name_of_board_university,eq.name_of_institute,eq.class_grade_division,
	eq.major_subject_of_degree_thesis_title,eq.passing_year,eq.no_of_attemot,eq.total_marks,eq.obtained_marks
		from employee_qualification eq,degree d 
	where eq.degree_id=d.degree_id and eq.employee_id=".$id." order by eq.passing_year ASC";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lQualification'><h3 class='tabs_involved'>Qualifiaction</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tQualification' class='tablesorter' cellspacing='0'> ";
		echo "<tr><thead><th>No.</th>";
		echo "<th>Degree</th>";
		echo "<th>Name of Board/University</th>";
		echo "<th>Name of Institute</th>";
		echo "<th>Class/Grade/Division</th>";
		echo "<th>Major Subject of Degree</th>";
		echo "<th>Passing Year</th>";
		echo "<th>No. of Attempt</th>";
		echo "<th>Percentage</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['degree_name']."</td>";
		echo "<td>".$result['name_of_board_university']."</td>";
		echo "<td>".$result['name_of_institute']."</td>";
		echo "<td>".$result['class_grade_division']."</td>";
		echo "<td>".$result['major_subject_of_degree_thesis_title']."</td>";
		echo "<td>".$result['passing_year']."</td>";
		echo "<td>".$result['no_of_attemot']."</td>";
		$per=$result['obtained_marks']*100/$result['total_marks'];
		echo "<td>".round($per)."%</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['degree_name']."</td>";
		echo "<td>".$result['name_of_board_university']."</td>";
		echo "<td>".$result['name_of_institute']."</td>";
		echo "<td>".$result['class_grade_division']."</td>";
		echo "<td>".$result['major_subject_of_degree_thesis_title']."</td>";
		echo "<td>".$result['passing_year']."</td>";
		echo "<td>".$result['no_of_attemot']."</td>";
		$per=$result['obtained_marks']*100/$result['total_marks'];
		echo "<td>".round($per)."%</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	//employee supporting information query.
	echo "<div id='mLSupporting'>";
	$query="select table_name 
		from supporting_information sp,employee_qualification eq,employee e 
		where sp.employee_qualification_id=eq.employee_qualification_id and e.employee_id=eq.employee_id and e.employee_id=".$id 
	." group by table_name";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$tableName=$result['table_name'];
		$squery="select sp.table_name,sp.table_primary_key,sp.column_name,sp.column_value
			from supporting_information sp,employee_qualification eq,employee e
		where sp.employee_qualification_id=eq.employee_qualification_id and e.employee_id=eq.employee_id and e.employee_id=".$id." and table_name='".$tableName."'";
		$squery_result=mysql_query($squery);
		echo "<b><div id='lSupporting'>- ".$tableName."</div></b>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tSupporting' class='tablesorter' cellspacing='0'> ";
		while($sresult=mysql_fetch_array($squery_result))
		{
			echo "<tr>";
			echo "<td>".$sresult['column_name']." : </td>";
			echo "<td>".$sresult['column_value']." : </td>";
			echo "</tr>";
		}		
		echo "</table></div>";
	while($result=mysql_fetch_array($query_result))
	{
		$tableName=$result['table_name'];
		echo "<br> <h4>- ".$tableName."</h4>";
		$squery="select sp.table_name,sp.table_primary_key,sp.column_name,sp.column_value
			from supporting_information sp,employee_qualification eq,employee e
		where sp.employee_qualification_id=eq.employee_qualification_id and e.employee_id=eq.employee_id and e.employee_id=".$id." 
		and table_name='".$tableName."'";
		$squery_result=mysql_query($squery);
		echo "<br> - ".$tableName;
		echo "<div id='tab1' class='tab_content'>";
		echo "<table class='tablesorter' cellspacing='0'> ";
		while($sresult=mysql_fetch_array($squery_result))
		{
			echo "<tr>";
			echo "<td>".$sresult['column_name']." : </td>";
			echo "<td>".$sresult['column_value']." : </td>";
			echo "</tr>";
		}		
		echo "</table></div>";
	}
	}
	echo "</div>";
	
	//employee experience query.
	$query="select ee.employee_experience_id,ee.organization_name,
	ee.address,ee.city,ee.state,ee.pin_code,ee.phone_no,
	ee.email_id,ee.website_name,te.type,tnw.type_of_nature_of_work,no_of_months,
	d.designation_name,ee.gross_monthly_salary,ee.joining_date,ee.leavin_date,ee.reason_of_leaving 
		from employee_experience ee,type_of_experience te,types_of_nature_of_work tnw,designation d 
	where ee.type_of_experience_id=te.type_of_experience_id and ee.type_of_nature_of_work_id=tnw.type_of_nature_of_work_id 
		and ee.designation_id=d.designation_id and ee.employee_id=".$id." order by ee.joining_date ASC";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lExperience'><h3 class='tabs_involved'>Experience Information</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tExperience' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Organization</th>";
		echo "<th>Address</th>";
		echo "<th>Phone No</th>";
		echo "<th>Email Id</th>";
		echo "<th>Website</th>";
		echo "<th>Experience Type</th>";
		echo "<th>Type of Nature of Work</th>";
		echo "<th>Designation</th>";
		echo "<th>Salary</th>";
		echo "<th>Joining Date</th>";
		echo "<th>Leavin Date</th>";
		echo "<th>Reason of Leaving</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['organization_name']."</td>";
		echo "<td>".$result['address'].", ".$result['city'].", ".$result['state']."-".$result['pin_code']."</td>";
		if($result['phone_no']!="")echo "<td>".$result['phone_no']  ."</td>";else echo "<td>-</td>";
		if($result['email_id']!="")echo "<td>".$result['email_id']  ."</td>";else echo "<td>-</td>";
		if($result['website_name']!="")echo "<td>".$result['website_name']  ."</td>";else echo "<td>-</td>";
		echo "<td>".$result['type']  ."</td>";
		echo "<td>".$result['type_of_nature_of_work']  ."</td>";
		echo "<td>".$result['designation_name']  ."</td>";
		echo "<td>".$result['gross_monthly_salary']  ."</td>";
		echo "<td>".$result['joining_date']  ."</td>";
		echo "<td>".$result['leavin_date']  ."</td>";
		echo "<td>".$result['reason_of_leaving']  ."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['organization_name']."</td>";
		echo "<td>".$result['address'].", ".$result['city'].", ".$result['state']."-".$result['pin_code']."</td>";
		if($result['phone_no']!="")echo "<td>".$result['phone_no']  ."</td>";else echo "<td>-</td>";
		if($result['email_id']!="")echo "<td>".$result['email_id']  ."</td>";else echo "<td>-</td>";
		if($result['website_name']!="")echo "<td>".$result['website_name']  ."</td>";else echo "<td>-</td>";
		echo "<td>".$result['type']  ."</td>";
		echo "<td>".$result['type_of_nature_of_work']  ."</td>";
		echo "<td>".$result['designation_name']  ."</td>";
		echo "<td>".$result['gross_monthly_salary']  ."</td>";
		echo "<td>".$result['joining_date']  ."</td>";
		echo "<td>".$result['leavin_date']  ."</td>";
		echo "<td>".$result['reason_of_leaving']  ."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	//employee publication paper query.
	$query="select epp.employee_publication_id,epp.title_of_research_paper,
	epp.name_of_journal_conference_proceeding,el.event_level,epp.ISSN_no,
	epp.volume_no,epp.issue_no,epp.page_no,tp.event_name,epp.date_of_publication,
	epp.name_of_co_authors,epp.API_score
		from employee_published_paper epp,employee e,event_level el,event_type tp 
	where e.employee_id=epp.employee_id and el.event_level_id=epp.event_level_id and 
	tp.event_type_id=epp.event_type_id and e.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and epp.date_of_publication >'".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and epp.date_of_publication <'".$toDate."'";
	}
	$query=$query ." order by epp.date_of_publication desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lPublishedPaper'><h3 class='tabs_involved'>Published Paper</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tPublishedPaper' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Title of Research Paper</th>";
		echo "<th>Name of Journal/Conference Proceeding</th>";
		echo "<th>Event Level</th>";
		echo "<th>Paper Info</th>";
		echo "<th>Type of Publication</th>";
		echo "<th>Date of Publication</th>";
		echo "<th>Co-Authors</th>";
		echo "<th>API Score</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['title_of_research_paper']."</td>";
		echo "<td>".$result['name_of_journal_conference_proceeding']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>ISSN No.: ".$result['ISSN_no']." Volume No.:".$result['volume_no']." issue No.: ".$result['issue_no']." Page No.: ".$result['page_no']."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['date_of_publication']."</td>";
		echo "<td>".$result['name_of_co_authors']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['title_of_research_paper']."</td>";
		echo "<td>".$result['name_of_journal_conference_proceeding']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>ISSN No.: ".$result['ISSN_no']."<br>Volume No.:".$result['volume_no']."<br>issue No.: ".$result['issue_no']."<br>Page No.: ".$result['page_no']."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['date_of_publication']."</td>";
		echo "<td>".$result['name_of_co_authors']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	//research project query.
	$query="select rp.research_project_id,rp.project_title,
	rp.submitted_to_body_funding_agency,rp.submitted_on_date,rp.approved_date,
	rp.start_date,rp.completion_date,rp.status,rp.budger_amount,rp.principal_investigator_id,
	rp.secondary_investiigator_id,rp.member_name,rp.remark,rp.API_score
		from research_project rp, employee e
	where rp.employee_id=e.employee_id and rp.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and submitted_on_date >'".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and submitted_on_date <'".$toDate."'";
	}
	$query=$query ." order by rp.submitted_on_date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lResearchProject'><h3 class='tabs_involved'>Research Project</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tResearchProject' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Project Title</th>";
		echo "<th>Submitted to Body Funding Agency</th>";
		echo "<th>Submitted on Date</th>";
		echo "<th>Approved Date</th>";
		echo "<th>Start Date</th>";
		echo "<th>Completion Date</th>";
		echo "<th>Status</th>";
		echo "<th>Project Amount</th>";
		echo "<th>Principal Investigator</th>";
		echo "<th>Secondary Investiigator</th>";
		echo "<th>Member Name</th>";
		echo "<th>Remark</th>";
		echo "<th>API Score</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['project_title']."</td>";
		echo "<td>".$result['submitted_to_body_funding_agency']."</td>";
		echo "<td>".$result['submitted_on_date']."</td>";
		echo "<td>".$result['approved_date']."</td>";
		echo "<td>".$result['start_date']."</td>";
		echo "<td>".$result['completion_date']."</td>";
		echo "<td>".$result['status']."</td>";
		echo "<td>".$result['budger_amount']."</td>";
		if($result['principal_investigator_id']!=""){ 
			$temp="select name from employee where employee_id=".$result['principal_investigator_id'];
			$temp=mysql_query($temp);
			$temp=mysql_fetch_array($temp);
			$name=$temp['name'];
			echo "<td>".$name."</td>";
		}else{
			echo "<td>-</td>";
		}
		if($result['secondary_investiigator_id']!=""){
			$temp="select name from employee where employee_id=".$result['secondary_investiigator_id'];
			$temp=mysql_query($temp);
			$temp=mysql_fetch_array($temp);
			$name=$temp['name'];
			echo "<td>".$name."</td>";
		}else{
			echo "<td>-</td>";
		}
		echo "<td>".$result['member_name']."</td>";
		echo "<td>".$result['remark']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['project_title']."</td>";
		echo "<td>".$result['submitted_to_body_funding_agency']."</td>";
		echo "<td>".$result['submitted_on_date']."</td>";
		echo "<td>".$result['approved_date']."</td>";
		echo "<td>".$result['start_date']."</td>";
		echo "<td>".$result['completion_date']."</td>";
		echo "<td>".$result['status']."</td>";
		echo "<td>".$result['budger_amount']."</td>";
		if($result['principal_investigator_id']!=""){ 
			echo "<td>".$result['principal_investigator_id']."</td>";
		}else{
			echo "<td>-</td>";
		}
		if($result['principal_investigator_id']!=""){
			echo "<td>".$result['secondary_investiigator_id']."</td>";
		}else{
			echo "<td>-</td>";
		}
		echo "<td>".$result['member_name']."</td>";
		echo "<td>".$result['remark']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	//employee presented paper query.
	$query="select epp.employee_presented_paper_id,epp.title_of_presented_paper,
	epp.title_of_conference_seminar,epp.organized_by,epp.sponsored_by,epp.date,
	el.event_level,epp.co_author,epp.rank_if_any,epp.API_score
		from employee_presented_paper epp,employee e,event_level el
	where e.employee_id=epp.employee_id and epp.event_level_id=el.event_level_id and e.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and epp.date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and epp.date <='".$toDate."'";
	}
	$query=$query ." order by epp.date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lPresentedPaper'><h3 class='tabs_involved'>Presented Paper</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tPresentedPaper' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Title</th>";
		echo "<th>Conference/Seminar</th>";
		echo "<th>Organized By</th>";
		echo "<th>Sponsored By</th>";
		echo "<th>Date</th>";
		echo "<th>Event Level</th>";
		echo "<th>Co-Author</th>";
		echo "<th>Renk</th>";
		echo "<th>API Score</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['title_of_presented_paper']."</td>";
		echo "<td>".$result['title_of_conference_seminar']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['event_level']."</td>";
		if($result['co_author']!=""){ 
			echo "<td>".$result['co_author']."</td>";
		}else{
			echo "<td>-</td>";
		}if($result['rank_if_any']!=""){ 
			echo "<td>".$result['rank_if_any']."</td>";
		}else{
			echo "<td>-</td>";
		}
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['title_of_presented_paper']."</td>";
		echo "<td>".$result['title_of_conference_seminar']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['event_level']."</td>";
		if($result['co_author']!=""){ 
			echo "<td>".$result['co_author']."</td>";
		}else{
			echo "<td>-</td>";
		}
		if($result['rank_if_any']!=""){ 
			echo "<td>".$result['rank_if_any']."</td>";
		}else{
			echo "<td>-</td>";
		}
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	//employee published book or chapter
	$query="select ep.employee_published_books_id,
	ep.ISBN_no,ep.book_chapter_name,ep.book_or_chapter,
	ep.publisher,ep.co_authors,ep.date_of_publication,ep.price,ep.no_of_page,ep.edition
		from  employee_published_books_chapters ep,employee e
	where ep.employee_id=e.employee_id and e.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and ep.date_of_publication >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and ep.date_of_publication <='".$toDate."'";
	}
	$query=$query ." order by ep.date_of_publication desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lPulishedBook'><h3 class='tabs_involved'>published book or chapter</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tPulishedBook' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>ISBN No.</th>";
		echo "<th>Book/Chapter Name</th>";
		echo "<th>Book/Chapter</th>";
		echo "<th>Publisher</th>";
		echo "<th>Co-Authors</th>";
		echo "<th>Date</th>";
		echo "<th>Price</th>";
		echo "<th>No of Page</th>";
		echo "<th>Edition</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>".$result['ISBN_no']."</td>";
		echo "<td>".$result['book_chapter_name']."</td>";
		echo "<td>".$result['book_or_chapter']."</td>";
		echo "<td>".$result['publisher']."</td>";
		echo "<td>".$result['co_authors']."</td>";
		echo "<td>".$result['date_of_publication']."</td>";
		echo "<td>".$result['price']."</td>";
		echo "<td>".$result['no_of_page']."</td>";
		echo "<td>".$result['edition']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$result['ISBN_no']."</td>";
		echo "<td>".$result['book_chapter_name']."</td>";
		echo "<td>".$result['book_or_chapter']."</td>";
		echo "<td>".$result['publisher']."</td>";
		echo "<td>".$result['co_authors']."</td>";
		echo "<td>".$result['date_of_publication']."</td>";
		echo "<td>".$result['price']."</td>";
		echo "<td>".$result['no_of_page']."</td>";
		echo "<td>".$result['edition']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
	}
		echo "</table></div>";
	}
	//employee participation query.
	$query="select ep.employee_participation_id,ep.event_title_subject,et.event_name,
	ep.from_date,ep.to_date,ep.organized_by,ep.sponsored_by,ep.location_address,ep.API_score
		from employee e,employee_participation ep,event_type et
	where e.employee_id=ep.employee_id and et.event_type_id=ep.event_type_id and ep.employee_id=".$id;
	 if($fromDate!="")
	{
		$query=$query . " and ep.from_date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and ep.from_date <='".$toDate."'";
	}
	$query=$query ." order by ep.from_date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lParticipation'><h3 class='tabs_involved'>Participation</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tParticipation' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Title/Subject</th>";
		echo "<th>Event Type</th>";
		echo "<th>Date</th>";
		echo "<th>Organized By</th>";
		echo "<th>Sponsored By</th>";
		echo "<th>Address</th>";
		echo "<th>API Score</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['event_title_subject']."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['from_date']." to ".$result['to_date']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['location_address']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['event_title_subject']."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['from_date']." to ".$result['to_date']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['location_address']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}

	//employee meeting attended query.
	$query="select ma.meeting_attended_id,ma.location_address,ma.meeting_agenda,ma.date,ma.duration_in_minutes,ma.organized_by
		from  meeting_attended ma,employee e
	where ma.employee_id=e.employee_id and e.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and ma.date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and ma.date <='".$toDate."'";
	}
	$query=$query ." order by ma.date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lMeeting'><h3 class='tabs_involved'>Meeting Attended</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tMeeting' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Address</th>";
		echo "<th>Meeting Agenda</th>";
		echo "<th>Date</th>";
		echo "<th>Duration(Minutes)</th>";
		echo "<th>Organized By</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['location_address']."</td>";
		echo "<td>".$result['meeting_agenda']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['duration_in_minutes']."(minutes)</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['location_address']."</td>";
		echo "<td>".$result['meeting_agenda']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['duration_in_minutes']."(minutes)</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	//employee Delivered lectures query.
	$query="select dl.delivered_lectures_id,dl.lecture_subject,
	dl.event_title,et.event_name,dl.date,dl.organized_by,dl.sponsored_by,
	el.event_level,dl.location,dl.API_score
		from delivered_lectures dl,employee e,event_type et,event_level el
	where dl.employee_id=e.employee_id and dl.event_type_id=et.event_type_id and
	dl.event_level_id=el.event_level_id and dl.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and dl.date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and dl.date <='".$toDate."'";
	}
	$query=$query ." order by dl.date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lDeliveredLectures'><h3 class='tabs_involved'>Delivered Lectures</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tDeliveredLectures' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Lecture Subject</th>";
		echo "<th>Event Title</th>";
		echo "<th>Event Type</th>";
		echo "<th>Date</th>";
		echo "<th>Organized By</th>";
		echo "<th>Sponsored By</th>";
		echo "<th>Event Level</th>";
		echo "<th>Address</th>";
		echo "<th>API Score</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['lecture_subject']."</td>";
		echo "<td>".$result['event_title']."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['lecture_subject']."</td>";
		echo "<td>".$result['event_title']."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>".$result['API_score']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}

	//employee Award query.
	$query="select a.award_id,a.award_name,a.award_for_activity,
	a.award_amount,a.event_title,et.event_name,el.event_level,
	a.date,a.organized_by,a.sponsored_by,a.location
		from award a,employee e,event_type et,event_level el
	where a.employee_id=e.employee_id and a.event_type_id=et.event_type_id and a.event_level_id=el.event_level_id and a.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and a.date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and a.date <='".$toDate."'";
	}
	$query=$query . " order by a.date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lAward'><h3 class='tabs_involved'>Award</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tAward' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Award</th>";
		echo "<th>Activity</th>";
		echo "<th>Amount</th>";
		echo "<th>Event Tilte</th>";
		echo "<th>Event</th>";
		echo "<th>Event Level</th>";
		echo "<th>Date</th>";
		echo "<th>Organized By</th>";
		echo "<th>Sponsored By</th>";
		echo "<th>Address</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['award_name']."</td>";
		echo "<td>".$result['award_for_activity']."</td>";
		echo "<td>".$result['award_amount']."</td>";
		echo "<td>".$result['event_title']."(minutes)</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['award_name']."</td>";
		echo "<td>".$result['award_for_activity']."</td>";
		echo "<td>".$result['award_amount']."</td>";
		echo "<td>".$result['event_title']."(minutes)</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	//employee examination duties query.
	$query="select ed.examination_duties_id,te.type_of_examination_duty,ed.date,ed.examination_body,ed.institute_name,ed.location
		from examination_duties ed,type_of_examination_duty te
	where ed.type_of_examination_duty_id=te.type_of_examination_duty_id and ed.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and ed.date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and ed.date <='".$toDate."'";
	}
	$query = $query . " ORDER BY ed.date DESC";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lExaminationDuties'><h3 class='tabs_involved'>Examination Duties</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tExaminationDuties' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Examination Duties</th>";
		echo "<th>Date</th>";
		echo "<th>Examination Body</th>";
		echo "<th>Institute</th>";
		echo "<th>Address</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['type_of_examination_duty']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>".$result['examination_body']."</td>";
		echo "<td>".$result['institute_name']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['temp']."</td>";
		echo "<td>".$result['type_of_nature_of_work']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	
	//employee invited as resource person query.
	$query="select rp.invited_as_resource_person,rp.event_name,et.event_name as temp,
	nw.type_of_nature_of_work,rp.organized_by,rp.sponsored,rp.location,rp.date
		from invited_as_resource_person rp,employee e,event_type et,types_of_nature_of_work nw
	where rp.employee_id=e.employee_id and et.event_type_id=rp.event_type_id and
	rp.type_of_nature_of_work_id=nw.type_of_nature_of_work_id and e.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and rp.date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and rp.date <='".$toDate."'";
	}
	$query=$query." order by rp.date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lInvitedResource'><h3 class='tabs_involved'>Invited As Resource Person</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tInvitedResource' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Event Name</th>";
		echo "<th>Event</th>";
		echo "<th>Nature of Work</th>";
		echo "<th>Organized By</th>";
		echo "<th>Sponsored By</th>";
		echo "<th>Address</th>";
		echo "<th>Date</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['temp']."</td>";
		echo "<td>".$result['type_of_nature_of_work']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['event_name']."</td>";
		echo "<td>".$result['temp']."</td>";
		echo "<td>".$result['type_of_nature_of_work']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored']."</td>";
		echo "<td>".$result['location']."</td>";
		echo "<td>".$result['date']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	//emplyee membership query.
	$query="select em.employee_membership_id,em.organization_name,em.organization_type,nw.type_of_nature_of_work,em.from_date,em.to_date
		from employee_membership em,types_of_nature_of_work nw
	where em.type_of_nature_of_work_id=nw.type_of_nature_of_work_id and em.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and em.from_date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and em.from_date <='".$toDate."'";
	}
	$query=$query." order by em.from_date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lMembership'><h3 class='tabs_involved'>Membership</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tMembership' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Organization</th>";
		echo "<th>Organized By</th>";
		echo "<th>Nature Work</th>";
		echo "<th>Date</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['organization_name']."</td>";
		echo "<td>".$result['organization_type']."</td>";
		echo "<td>".$result['type_of_nature_of_work']."</td>";
		echo "<td>".$result['from_date']." to ".$result['to_date']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['organization_name']."</td>";
		echo "<td>".$result['organization_type']."</td>";
		echo "<td>".$result['type_of_nature_of_work']."</td>";
		echo "<td>".$result['from_date']." to ".$result['to_date']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	//employee other activity query.
	$query="select oa.activity_id,oa.activity_name,at.activity_type,
	el.event_level,oa.organized_by,oa.sponsored_by,oa.loaction,
	nw.type_of_nature_of_work,oa.from_date,oa.to_date
		from other_activity oa,activity_type  at,event_level el,types_of_nature_of_work nw
	where oa.activity_type_id=at.activity_type_id and el.event_level_id=oa.event_level_id and 
	nw.type_of_nature_of_work_id=oa.type_of_nature_of_work_id and oa.employee_id=".$id;
	if($fromDate!="")
	{
		$query=$query . " and oa.from_date >='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and oa.from_date <='".$toDate."'";
	}
	$query=$query." order by oa.from_date desc";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<header><div id='lOtherActivity'><h3 class='tabs_involved'>Other Activity</h3></div></header>";
		echo "<div id='tab1' class='tab_content'>";
		echo "<table id='tOtherActivity' class='tablesorter' cellspacing='0'> ";
		echo "<thead><tr>";
		echo "<th>No.</th>";
		echo "<th>Activity</th>";
		echo "<th>Membership</th>";
		echo "<th>Event</th>";
		echo "<th>Organized By</th>";
		echo "<th>Sponsored By</th>";
		echo "<th>Address</th>";
		echo "<th>Nature of Work</th>";
		echo "<th>Date</th>";
		echo "<th>Edit  ";
		echo "Delete</th>";
		echo "</tr></thead>";
		
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>".$result['activity_name']."</td>";
		echo "<td>".$result['activity_type']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['loaction']."</td>";
		echo "<td>".$result['type_of_nature_of_work']."</td>";
		echo "<td>".$result['from_date']." to ".$result['to_date']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no=2;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$result['activity_name']."</td>";
		echo "<td>".$result['activity_type']."</td>";
		echo "<td>".$result['event_level']."</td>";
		echo "<td>".$result['organized_by']."</td>";
		echo "<td>".$result['sponsored_by']."</td>";
		echo "<td>".$result['loaction']."</td>";
		echo "<td>".$result['type_of_nature_of_work']."</td>";
		echo "<td>".$result['from_date']." to ".$result['to_date']."</td>";
		echo "<td>Edit  ";
		echo "Delete</td>";
		echo "</tr>";
		$no++;
	}
		echo "</table></div>";
	}
	
	
}else{
	include_once('logout.php'); 
}	
}else{
	include_once('logout.php');
}
?>
</article>
</section>
</body>
</html>