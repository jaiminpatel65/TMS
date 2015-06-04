<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	include_once('logout.php');  
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Tracking Institute Information</h4>
<article class="module width_full">
<header><h3 class="tabs_involved">Institute Information</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form method="post" action="trackingInstituteInformation.php">
<tr><td>Date</td><td><input type="date" id="fromDate" name="fromDate" value="<?php if(isset($_POST['fromDate']))echo $_POST['fromDate'];?>"/></td><td>to</td>
 <td><input type="date" id="toDate" name="toDate" value="<?php if(isset($_POST['toDate']))echo $_POST['toDate'];?>"/></td>
<td><input type="submit" value="Find"></td></tr>
</form></table>
<?php
$fromDate="";
$toDate="";
if(isset($_POST['fromDate']) && $_POST['fromDate']!="")
{
	$fromDate=$_POST['fromDate'];
}
if(isset($_POST['toDate']) && $_POST['toDate']!="")
{
	$toDate=$_POST['toDate'];
}
if($fromDate!="" && $toDate!="")
{
	echo "<br>Note : Data Display ".$fromDate." to ".$toDate." Up to Date.";
}
else
{
	echo "<br> Note : All Data Dispaly.";
}
include_once('../connect.php');
$query="select department_name from department";
$query_result=mysql_query($query);
echo "<div id='tab1' class='tab_content'>";
echo "<table class='tablesorter' cellspacing='0'> ";
echo "<thead><tr>";
echo "<th>Department Name</th>";
$cnt=0;
while($result=mysql_fetch_array($query_result))
{
	echo "<th>".$result['department_name']."</th>";
	$department_name[$cnt]=$result['department_name'];
	$cnt++;
}
echo "</tr></thead>";
//Published Paper
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as published_paper
	from department d,employee e,employee_published_paper epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date_of_publication>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date_of_publication<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['published_paper'];
		}
	}
}
echo "<tr>";
echo "<td>Published Paper</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Researcg Project
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as research_project
	from department d,employee e,research_project rp
where d.department_id=e.department_id and e.employee_id=rp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and completion_date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and completion_date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['research_project'];
		}
	}
}
echo "<tr>";
echo "<td>Research Project</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Presented Paper
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as employee_presented_paper
	from department d,employee e,employee_presented_paper epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['employee_presented_paper'];
		}
	}
}
echo "<tr>";
echo "<td>Presented Paper</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Published Book/Chapter
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as employee_published_books_chapters
	from department d,employee e,employee_published_books_chapters ep
where d.department_id=e.department_id and e.employee_id=ep.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date_of_publication>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date_of_publication<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['employee_published_books_chapters'];
		}
	}
}
echo "<tr>";
echo "<td>Published Book/Chapter</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Participation
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as employee_participation
	from department d,employee e,employee_participation epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and from_date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and from_date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['employee_participation'];
		}
	}
}
echo "<tr>";
echo "<td>Participation</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Meeting Attended
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as meeting_attended
	from department d,employee e,meeting_attended epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['meeting_attended'];
		}
	}
}
echo "<tr>";
echo "<td>Meeting Attended</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Delivered Lectures
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as delivered_lectures
	from department d,employee e,delivered_lectures epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['delivered_lectures'];
		}
	}
}
echo "<tr>";
echo "<td>Delivered Lectures</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Award
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as award
	from department d,employee e,award epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['award'];
		}
	}
}
echo "<tr>";
echo "<td>Award</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Examination Duties
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as examination_duties
	from department d,employee e,examination_duties epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['examination_duties'];
		}
	}
}
echo "<tr>";
echo "<td>Examination Duties</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Invited As Resource Person
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as invited_as_resource_person
	from department d,employee e,invited_as_resource_person epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['invited_as_resource_person'];
		}
	}
}
echo "<tr>";
echo "<td>Invited As Resource Person</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Membership
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as employee_membership
	from department d,employee e,employee_membership epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and from_date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and from_date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['employee_membership'];
		}
	}
}
echo "<tr>";
echo "<td>Membership (No fo Visited)</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

//Other Actitivity
for($i=0;$i<$cnt;$i++)
{
	$arrayCnt[$i]=0;
}
$query="select d.department_name,count(d.department_name) as other_activity
	from department d,employee e,other_activity epp
where d.department_id=e.department_id and e.employee_id=epp.employee_id";
	if($fromDate!="")
	{
		$query=$query . " and from_date>='".$fromDate."'";
	}
	if($toDate!="")
	{
		$query=$query . " and from_date<='".$toDate."'";
	}
	$query=$query." group by d.department_name";
$query_result=mysql_query($query);
while($result=mysql_fetch_array($query_result))
{
	for($i=0;$i<$cnt;$i++)
	{
		if($department_name[$i]==$result['department_name'])
		{
			$arrayCnt[$i]=$result['other_activity'];
		}
	}
}
echo "<tr>";
echo "<td>Other Activity</td>";
for($i=0;$i<$cnt;$i++)
{
	echo "<td>".$arrayCnt[$i]."</td>";
}
echo "</tr>";

echo "</table></div>";
?>
</div>
</article>
</section>
</body>
</html>