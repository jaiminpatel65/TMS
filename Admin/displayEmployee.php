<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	include_once('logout.php');  
}
?>
<html>
<body>
<?php
if(isset($_POST['name']) || isset($_POST['department']))
{
$name=$_POST['name'];
$department=$_POST['department'];
include_once('../connect.php');
$query="select employee_id,name,department_name
	from employee e,department d
where d.department_id=e.department_id";
if($department!=0)
{
	$query=$query . " and d.department_id=".$department;
}
$query = $query. " and name like '%".$name."%'";
$query_result=mysql_query($query);

if($result=mysql_fetch_array($query_result))
{
	echo "<div class='tab_container'>";
	echo "<div id='tab1' class='tab_content'>";
	echo "<table class='tablesorter' cellspacing='0'> ";
	echo "<thead><tr>";
	echo "<th>No</th>";
	echo "<th>Name</th>";
	echo "<th>Department</th>";
	echo "<th>Get</th>";
	echo "</tr></thead>";
	echo "<tr>";
	echo "<td>1</td>";
	echo "<td>".$result['name']."</td>";
	echo "<td>".$result['department_name']."</td>";
	echo "<td><a href='insert.php?employee_id=".$result['employee_id']."'>Insert</a></td>";
	echo "</tr>";
	$no=2;
	while($result=mysql_fetch_array($query_result))
	{
	echo "<tr>";
	echo "<td>".$no."</td>";
	echo "<td>".$result['name']."</td>";
	echo "<td>".$result['department_name']."</td>";
	echo "<td><a href='insert.php?employee_id=".$result['employee_id']."'>Insert</a></td>";
	echo "</tr>";
	$no++;	
	}
	echo "</table></div></div>";
}
else
{
	echo "<font color='red'>Data Not Found.!</font>";
}
}
else
{
	include_once('logout.php');
}
?>
</body>
</html>