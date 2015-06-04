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
	$('#listEventType').hide();
	$('#listEventLevel').hide();
	$('#listActivityType').hide();
	var table = $("#listTable");
	$("#listTable").live("click", function(){
		if(table.val()=="Published Paper")
		{
			$('#listEventType').show();
			$('#listEventLevel').show();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Research Project")
		{
			$('#listEventType').hide();
			$('#listEventLevel').hide();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Presented Paper")
		{
			$('#listEventType').show();
			$('#listEventLevel').show();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Published Book or Chapter")
		{
			$('#listEventType').hide();
			$('#listEventLevel').hide();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Participation")
		{
			$('#listEventType').show();
			$('#listEventLevel').hide();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Meeting Attended")
		{
			$('#listEventType').hide();
			$('#listEventLevel').hide();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Delivered Lectures")
		{
			$('#listEventType').show();
			$('#listEventLevel').show();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Award")
		{
			$('#listEventType').show();
			$('#listEventLevel').show();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Examination Duties")
		{
			$('#listEventType').show();
			$('#listEventLevel').show();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Invited As Resource Person")
		{
			$('#listEventType').show();
			$('#listEventLevel').hide();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Membership")
		{
			$('#listEventType').hide();
			$('#listEventLevel').hide();
			$('#listActivityType').hide();
		}
		else if(table.val()=="Other Activity")
		{
			$('#listEventType').hide();
			$('#listEventLevel').show();
			$('#listActivityType').show();
		}
		else{
			$('#listEventType').hide();
			$('#listEventLevel').hide();
			$('#listActivityType').hide();
		}
	});
	});
	</script>
</head>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Tracking Department Information</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Department Information</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="3" cellspacing="3">
<form class="forminput" method="POST" action="trackingDepartmentInformation.php">
<?php
include_once('../connect.php');

$query="select department_id,department_name from department";
$query_result=mysql_query($query);
echo "<tr><td><select id='listDepartment' name='listDepartment'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['department_id']."'>".$result['department_name']."</option>";
}
echo "</select></td>";
?>
<td><select id="listTable" name="listTable">
	<option value="">---</option>
	<option value="Published Paper">Published Paper</option>
	<option value="Research Project">Research Project</option>
	<option value="Presented Paper">Presented Paper</option>
	<option value="Published Book or Chapter">Published Book or Chapter</option>
	<option value="Participation">Participation</option>
	<option value="Meeting Attended">Meeting Attended</option>
	<option value="Delivered Lectures">Delivered Lectures</option>
	<option value="Award">Award</option>
	<option value="Examination Duties">Examination Duties</option>
	<option value="Invited As Resource Person">Invited As Resource Person</option>
	<option value="Membership">Membership</option>
	<option value="Other Activity">Other Activity</option>
</select></td>
<?php
$query="select event_type_id,event_name from event_type";
$query_result=mysql_query($query);
echo "<td><select id='listEventType' name='listEventType'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['event_type_id']."'>".$result['event_name']."</option>";
}
echo "</select></td>";

$query="select event_level_id,event_level from event_level";
$query_result=mysql_query($query);
echo "<td><select id='listEventLevel' name='listEventLevel'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['event_level_id']."'>".$result['event_level']."</option>";
}
echo "</select></td>";

$query="select activity_type_id,activity_type from activity_type";
$query_result=mysql_query($query);
echo "<td><select id='listActivityType' name='listActivityType'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['activity_type_id']."'>".$result['activity_type']."</option>";
}
echo "</select></td>";
?>
<td><input type="date" id="txtFromDate" name="txtFromDate" value="<?php if(isset($_POST['txtFromDate']))echo $_POST['txtFromDate'];?>" /></td><td> to 
<input type="date" id="txtToDate" name="txtToDate" value="<?php if(isset($_POST['txtToDate']))echo $_POST['txtToDate'];?>" /></td> 
<td><input type="submit" value="Apply"/></td>
</form></table></div>
<?php
if(isset($_POST['listDepartment']) && isset($_POST['listTable']))
{
if($_POST['listDepartment']!="" && $_POST['listTable']!="" && $_POST['txtFromDate']!="" && $_POST['txtToDate']!="")
{
	$departmentId=$_POST['listDepartment'];
	$listTable=$_POST['listTable'];
	$fromDate=$_POST['txtFromDate'];
	$toDate=$_POST['txtToDate'];
	$query="select department_name from department where department_id=".$departmentId;
	$query_result=mysql_query($query);
	$result=mysql_fetch_array($query_result);
	echo "Department : " .$result['department_name'];
	echo "<br>Information : " .$listTable;
	echo "<br>Date(yyyy-mm-dd) : " .$fromDate . " to " . $toDate;
if($listTable=="Published Paper")
{
	$query="select e.employee_id,e.name 
		from employee e,employee_published_paper epp
	where e.employee_id=epp.employee_id and e.department_id=".$departmentId." 
		and epp.date_of_publication>='".$fromDate."'  and epp.date_of_publication<='".$toDate."'";
	if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
	{
		$query = $query . " and epp.event_type_id=".$_POST['listEventType'];
	}
	if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
	{
		$query = $query . " and epp.event_level_id=".$_POST['listEventLevel'];
	}
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,employee_published_paper epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date_of_publication>='".$fromDate."'  and epp.date_of_publication<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,employee_published_paper epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date_of_publication>='".$fromDate."'  and epp.date_of_publication<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from employee_published_paper
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date_of_publication>='".$fromDate."'  and date_of_publication<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,employee_published_paper epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date_of_publication>='".$fromDate."'  and epp.date_of_publication<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,employee_published_paper epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date_of_publication>='".$fromDate."'  and epp.date_of_publication<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from employee_published_paper
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date_of_publication>='".$fromDate."'  and date_of_publication<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	}
	}
}
else if($listTable=="Research Project")
{
	$query="select e.employee_id,e.name
		from employee e,research_project rp
	where e.employee_id=rp.employee_id and e.department_id=".$departmentId."
		 and submitted_on_date>='".$fromDate."' and submitted_on_date<='".$toDate."'
	 group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br> Name : ".$result['name'];
		$employeeId=$result['employee_id'];
		$temp="select employee_id,status,count(status) as cnt 
			from research_project 
		where employee_id=".$employeeId." group by employee_id,status";
		$temp=mysql_query($temp);
		echo "<br -- >";
		while($rtemp=mysql_fetch_array($temp))
		{
			echo " ".$rtemp['status']." : ".$rtemp['cnt'].",";
			$total=$total+$rtemp['cnt'];
		}
		echo "<br>Total : ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br> Name : ".$result['name'];
		$employeeId=$result['employee_id'];
		$temp="select employee_id,status,count(status) as cnt 
			from research_project 
		where employee_id=".$employeeId." group by employee_id,status";
		$temp=mysql_query($temp);
		echo "<br -- >";
		while($rtemp=mysql_fetch_array($temp))
		{
			echo " ".$rtemp['status']." : ".$rtemp['cnt'].",";
			$total=$total+$rtemp['cnt'];
		}
		echo "<br>Total : ".$total;
	}
	}
}
else if($listTable=="Presented Paper")
{
	$query="select e.employee_id,e.name 
		from employee e,employee_presented_paper epp
	where e.employee_id=epp.employee_id and e.department_id=".$departmentId." 
		and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
	if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
	{
		$query = $query . " and epp.event_type_id=".$_POST['listEventType'];
	}
	if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
	{
		$query = $query . " and epp.event_level_id=".$_POST['listEventLevel'];
	}
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,employee_presented_paper epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,employee_presented_paper epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from employee_presented_paper
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date>='".$fromDate."'  and date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,employee_presented_paper epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,employee_presented_paper epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from employee_presented_paper
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date>='".$fromDate."'  and date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	}
	}
}
else if($listTable=="Published Book or Chapter")
{
	$query="select e.employee_id,e.name 
		from employee e,employee_published_books_chapters epp
	where e.employee_id=epp.employee_id and e.department_id=".$departmentId." 
		and epp.date_of_publication>='".$fromDate."'  and epp.date_of_publication<='".$toDate."'";
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$bookQuery="select count(book_chapter_name) as book
			from employee e,employee_published_books_chapters epb
		where e.employee_id=epb.employee_id and book_or_chapter='book' and e.employee_id=".$employeeId." 
		and epb.date_of_publication>='".$fromDate."'  and epb.date_of_publication<='".$toDate."'
			 group by book_chapter_name";
		$book_query_result=mysql_query($bookQuery);
		echo "<br>";
		if($bookResult=mysql_fetch_array($book_query_result))
		{
			echo " Book : ".$bookResult['book'];
		}
		$bookQuery="select count(book_chapter_name) as book
			from employee e,employee_published_books_chapters epb
		where e.employee_id=epb.employee_id and book_or_chapter='chapter' and e.employee_id=".$employeeId." 
		and epb.date_of_publication>='".$fromDate."'  and epb.date_of_publication<='".$toDate."'
			 group by book_chapter_name";
		$book_query_result=mysql_query($bookQuery);
		if($bookResult=mysql_fetch_array($book_query_result))
		{
			echo " Chapter : ".$bookResult['book'];
		}
	while($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$bookQuery="select count(book_chapter_name) as book
			from employee e,employee_published_books_chapters epb
		where e.employee_id=epb.employee_id and book_or_chapter='book' and e.employee_id=".$employeeId." 
		and epb.date_of_publication>='".$fromDate."'  and epb.date_of_publication<='".$toDate."'
			 group by book_chapter_name";
		$book_query_result=mysql_query($bookQuery);
		echo "<br>";
		if($bookResult=mysql_fetch_array($book_query_result))
		{
			echo " Book : ".$bookResult['book'];
		}
		$bookQuery="select count(book_chapter_name) as book
			from employee e,employee_published_books_chapters epb
		where e.employee_id=epb.employee_id and book_or_chapter='chapter' and e.employee_id=".$employeeId." 
		and epb.date_of_publication>='".$fromDate."'  and epb.date_of_publication<='".$toDate."'
			 group by book_chapter_name";
		$book_query_result=mysql_query($bookQuery);
		if($bookResult=mysql_fetch_array($book_query_result))
		{
			echo " Chapter : ".$bookResult['book'];
		}
	}		
	}
}
else if($listTable=="Participation")
{
	$query="select e.employee_id,e.name 
		from employee e,employee_participation epp
	where e.employee_id=epp.employee_id and e.department_id=".$departmentId." 
		and epp.from_date>='".$fromDate."'  and epp.from_date<='".$toDate."'";
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$pQuery="select et.event_name,count(et.event_name)as cnt
			from event_type et,employee_participation ep
		where et.event_type_id=ep.event_type_id and ep.employee_id=".$employeeId." 
		and ep.from_date>='".$fromDate."'  and ep.from_date<='".$toDate."'
		group by et.event_name ;";
		$p_query_result=mysql_query($pQuery);
		echo "<br>";
		while($pResult=mysql_fetch_array($p_query_result))
		{
			echo " " .$pResult['event_name']." : ".$pResult['cnt'].",";
			$total=$total+$pResult['cnt'];
		}
		echo "<br>Total : " .$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$pQuery="select et.event_name,count(et.event_name)as cnt
			from event_type et,employee_participation ep
		where et.event_type_id=ep.event_type_id and ep.employee_id=".$employeeId." 
		and ep.from_date>='".$fromDate."'  and ep.from_date<='".$toDate."'
		group by et.event_name ;";
		$p_query_result=mysql_query($pQuery);
		echo "<br>";
		while($pResult=mysql_fetch_array($p_query_result))
		{
			echo " " .$pResult['event_name']." : ".$pResult['cnt'].",";
			$total=$total+$pResult['cnt'];
		}
		echo "<br>Total : " .$total;
	}		
	}
}
else if($listTable=="Meeting Attended")
{
	$query="select e.employee_id,e.name,count(e.employee_id) as cnt
		from employee e,meeting_attended ma
	where e.employee_id=ma.employee_id and e.department_id=".$departmentId."
		and date>='".$fromDate."' and date<='".$toDate."' 
	group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		echo "<br> -- Attened Meeting : ".$result['cnt'];
	while($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		echo "<br> -- Attened Meeting : ".$result['cnt'];
	}
	}
}
else if($listTable=="Delivered Lectures")
{
	$query="select e.employee_id,e.name
		from employee e,delivered_lectures dl
	where e.employee_id=dl.employee_id and e.department_id=".$departmentId." 
		and dl.date>='".$fromDate."'  and dl.date<='".$toDate."'";
	if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
	{
		$query = $query . " and dl.event_type_id=".$_POST['listEventType'];
	}
	if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
	{
		$query = $query . " and dl.event_level_id=".$_POST['listEventLevel'];
	}
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,delivered_lectures epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,delivered_lectures epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from delivered_lectures
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date>='".$fromDate."'  and date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,delivered_lectures epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,delivered_lectures epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from delivered_lectures
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date>='".$fromDate."'  and date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	}
	}	
}
else if($listTable=="Award")
{
	$query="select e.employee_id,e.name
		from employee e,award a
	where e.employee_id=a.employee_id and e.department_id=".$departmentId." 
		and a.date>='".$fromDate."'  and a.date<='".$toDate."'";
	if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
	{
		$query = $query . " and a.event_type_id=".$_POST['listEventType'];
	}
	if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
	{
		$query = $query . " and a.event_level_id=".$_POST['listEventLevel'];
	}
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,award epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,award epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from award
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date>='".$fromDate."'  and date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name
			from event_type et,award epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['event_name'];
			$eventTypeId=$typeResult['event_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,award epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.event_type_id=".$eventTypeId."
			 and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from award
				where employee_id=".$employeeId." and event_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and date>='".$fromDate."'  and date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	}
	}
}
else if($listTable=="Examination Duties")
{
	$query="select e.employee_id,e.name,count(e.employee_id) as cnt
		from employee e,examination_duties ed
	where e.employee_id=ed.employee_id and e.department_id=".$departmentId."
		and ed.date>='".$fromDate."' and ed.date<='".$toDate."' 
	group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		echo "<br> -- No of Duties : ".$result['cnt'];
	while($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		echo "<br> -- No of Duties : ".$result['cnt'];
	}
	}
}
else if($listTable=="Invited As Resource Person")
{
	$query="select e.employee_id,e.name
		from employee e,invited_as_resource_person a
	where e.employee_id=a.employee_id and e.department_id=".$departmentId." 
		and a.date>='".$fromDate."'  and a.date<='".$toDate."'";
	if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
	{
		$query = $query . " and a.event_type_id=".$_POST['listEventType'];
	}
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name,count(et.event_type_id) as cnt
			from event_type et,invited_as_resource_person epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		//echo $typeQuery;
		$typeQeuryResult=mysql_query($typeQuery);
		echo "<br>";
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo " ".$typeResult['event_name']." : ".$typeResult['cnt'].",";
			$total=$total+$typeResult['cnt'];
		}
	echo "<br> Total = ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.event_type_id,et.event_name,count(et.event_type_id) as cnt
			from event_type et,invited_as_resource_person epp
		where et.event_type_id=epp.event_type_id and epp.employee_id=".$employeeId."
			and epp.date>='".$fromDate."'  and epp.date<='".$toDate."'";
		if(isset($_POST['listEventType']) && $_POST['listEventType']!="")
		{
			$typeQuery = $typeQuery . " and et.event_type_id=".$_POST['listEventType'];
		}
		$typeQuery = $typeQuery . " group by et.event_type_id";
		//echo $typeQuery;
		$typeQeuryResult=mysql_query($typeQuery);
		echo "<br>";
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo " ".$typeResult['event_name']." : ".$typeResult['cnt'].",";
			$total=$total+$typeResult['cnt'];
		}
	echo "<br> Total = ".$total;
	}
	}
}
else if($listTable=="Membership")
{
	$query="select e.employee_id,e.name
		from employee e,employee_membership em
	where e.employee_id=em.employee_id and e.department_id=".$departmentId."
		and em.from_date>='".$fromDate."' and em.from_date<='".$toDate."' 
	group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		echo "<br> -- No of Visit ";
		$temp="select employee_membership_id,organization_name,count(organization_name) as cnt
			from employee_membership 
		where employee_id=".$employeeId." group by organization_name";
		$temp=mysql_query($temp);
		echo "<br>";
		$total=0;
		while($rtemp=mysql_fetch_array($temp))
		{
			echo " ".$rtemp['organization_name'] ." : ".$rtemp['cnt'].",";
			$total=$total+$rtemp['cnt'];
		}
		echo "<br>Total : ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		echo "<br> -- No of Visit ";
		$temp="select employee_membership_id,organization_name,count(organization_name) as cnt
			from employee_membership 
		where employee_id=".$employeeId." group by organization_name";
		$temp=mysql_query($temp);
		echo "<br>";
		$total=0;
		while($rtemp=mysql_fetch_array($temp))
		{
			echo " ".$rtemp['organization_name'] ." : ".$rtemp['cnt'].",";
			$total=$total+$rtemp['cnt'];
		}
		echo "<br>Total : ".$total;
	}
	}
}
else if($listTable=="Other Activity")
{
	$query="select e.employee_id,e.name
		from employee e,other_activity dl
	where e.employee_id=dl.employee_id and e.department_id=".$departmentId." 
		and dl.from_date>='".$fromDate."'  and dl.from_date<='".$toDate."'";
	if(isset($_POST['listActivityType']) && $_POST['listActivityType']!="")
	{
		$query = $query . " and dl.activity_type_id=".$_POST['listActivityType'];
	}
	if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
	{
		$query = $query . " and dl.event_level_id=".$_POST['listEventLevel'];
	}
	$query=$query ." group by e.employee_id";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.activity_type_id,et.activity_type
			from activity_type et,other_activity epp
		where et.activity_type_id=epp.activity_type_id and epp.employee_id=".$employeeId."
			and epp.from_date>='".$fromDate."'  and epp.from_date<='".$toDate."'";
		if(isset($_POST['listActivityType']) && $_POST['listActivityType']!="")
		{
			$typeQuery = $typeQuery . " and et.activity_type_id=".$_POST['listActivityType'];
		}
		$typeQuery = $typeQuery . " group by et.activity_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['activity_type'];
			$eventTypeId=$typeResult['activity_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,other_activity epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.activity_type_id=".$eventTypeId."
			 and epp.from_date>='".$fromDate."'  and epp.from_date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from other_activity
				where employee_id=".$employeeId." and activity_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and from_date>='".$fromDate."'  and from_date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	while($result=mysql_fetch_array($query_result))
	{
		$total=0;
		echo "<br><br>Name = : " . $result['name'];
		$employeeId=$result['employee_id'];
		$typeQuery="select et.activity_type_id,et.activity_type
			from activity_type et,other_activity epp
		where et.activity_type_id=epp.activity_type_id and epp.employee_id=".$employeeId."
			and epp.from_date>='".$fromDate."'  and epp.from_date<='".$toDate."'";
		if(isset($_POST['listActivityType']) && $_POST['listActivityType']!="")
		{
			$typeQuery = $typeQuery . " and et.activity_type_id=".$_POST['listActivityType'];
		}
		$typeQuery = $typeQuery . " group by et.activity_type_id";
		$typeQeuryResult=mysql_query($typeQuery);
		while($typeResult=mysql_fetch_array($typeQeuryResult))
		{
			echo "<br> -- " . $typeResult['activity_type'];
			$eventTypeId=$typeResult['activity_type_id'];
			$levelQuery="select el.event_level_id,el.event_level
				from event_level el,other_activity epp
			where el.event_level_id=epp.event_level_id and epp.employee_id=".$employeeId." and epp.activity_type_id=".$eventTypeId."
			 and epp.from_date>='".$fromDate."'  and epp.from_date<='".$toDate."'";
			if(isset($_POST['listEventLevel']) && $_POST['listEventLevel']!="")
			{
				$levelQuery = $levelQuery . " and el.event_level_id=".$_POST['listEventLevel'];
			}
			$levelQuery = $levelQuery . " group by el.event_level_id";
			echo "<br>";
			$levelQeuryResult=mysql_query($levelQuery);
			while($levelResult=mysql_fetch_array($levelQeuryResult))
			{
				echo " ".$levelResult['event_level'] ." : ";
				$eventLevelId=$levelResult['event_level_id'];
				$temp="select count(event_level_id) as cnt
					from other_activity
				where employee_id=".$employeeId." and activity_type_id=".$eventTypeId." and event_level_id=".$eventLevelId." 
				 and from_date>='".$fromDate."'  and from_date<='".$toDate."'";
				$temp=mysql_query($temp);
				$temp=mysql_fetch_array($temp);
				echo $temp['cnt'].",";
				$total=$total + $temp['cnt'];
			}
		}
	echo "<br> Total = ".$total;
	}
	}
}
}
else{
	echo "Select Departmetn Name,date and Table name !";
}
}
else{
	echo  "Not Set";
}
?>
</article>
</section>
</body>
</html>