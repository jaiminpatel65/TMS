<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
?>
<html>
<body>
<?php
include_once('../connect.php');
$name=$_POST['name'];
$departmentId=$_POST['departmentId'];
$gender=$_POST['gender'];
$categoryId=$_POST['categoryId'];
$maritalStatus=$_POST['maritalStatus'];
$query="select e.employee_id,d.department_name,e.name,
	e.local_address_line1,e.local_pin_code,
	e.local_area,e.local_city,e.loacl_state,e.gender,e.DOB,s.category,e.marital_status
		from employee e,department d,social_category s
	where e.department_id=d.department_id and s.category_id=e.social_category_id";

if($name!="")
{
	$query=$query." and name like '%".$name."%'";
}
if($departmentId!="")
{
	$query=$query." and e.department_id=".$departmentId;
}
if($gender!="")
{
	$query=$query." and e.gender='".$gender."'";
}
if($categoryId!="")
{
	$query=$query." and e.social_category_id=".$categoryId;
} 
if($maritalStatus!="")
{
	$query=$query." and e.marital_status='".$maritalStatus."'";
} 	

$query_result=mysql_query($query);
if($result=mysql_fetch_array($query_result))
{
	echo "<div id='tab1' class='tab_content'>";
	echo "<table class='tablesorter' cellspacing='0'> ";
	echo "<thead><tr>";
	echo "<th>No.</th>";
	echo "<th>Department</th>";
	echo "<th>Name</th>";
	echo "<th>Address</th>";
	echo "<th>Gender</th>";
	echo "<th>Date of Birth</th>";
	echo "<th>Social Category</th>";
	echo "<th>Marital Status</th>";
	echo "</tr></thead>";
	
	echo "<tr id='".$result['employee_id']."' class='link'>";
	echo "<td>1</td>";
	echo "<td>".$result['department_name']."</td>";
	echo "<td>".$result['name']."</td>";
	echo "<td>".$result['local_address_line1'].", ".$result['local_area'].", ".$result['local_city'].", ".$result['loacl_state']."-".$result['local_pin_code']."</td>";
	echo "<td>".$result['gender']."</td>";
	echo "<td>".$result['DOB']."</td>";
	echo "<td>".$result['category']."</td>";
	echo "<td>".$result['marital_status']."</td>";
	echo "</tr>";
	
	$no=2;
while($result=mysql_fetch_array($query_result))
{
	echo "<tr id='".$result['employee_id']."' class='link'>";
	echo "<td>".$no."</td>";
	echo "<td>".$result['department_name']."</td>";
	echo "<td>".$result['name']."</td>";
	echo "<td>".$result['local_address_line1'].", ".$result['local_area'].", ".$result['local_city'].", ".$result['loacl_state']."-".$result['local_pin_code']."</td>";
	echo "<td>".$result['gender']."</td>";
	echo "<td>".$result['DOB']."</td>";
	echo "<td>".$result['category']."</td>";
	echo "<td>".$result['marital_status']."</td>";
	echo "</tr>";
	$no++;
}
	echo "</table></div>";
}
?>
</body>
</html>