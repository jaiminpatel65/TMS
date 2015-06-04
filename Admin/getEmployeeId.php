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
		var name=$("#txtName");
		var department = $("#listDepartment");
		$("#listDepartment").click(function(){
			$.ajax({
				type: "post"
				,url: "displayEmployee.php"
				,data: "department="+department.val()+"&name="+name.val(),
				success: function(msg) {
					$("#target").html ("<p>"+msg+"</p>").fadeIn("slow");
				}
			});
		});
		$("#txtName").keyup(function(){
			$.ajax({
				type: "post"
				,url: "displayEmployee.php"
				,data: "department="+department.val()+"&name="+name.val(),
				success: function(msg) {
					$("#target").html ("<p>"+msg+"</p>").fadeIn("slow");
				}
			});
		});
	});
	</script>
</head>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Insert Record</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Insert Record</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<tr><td><input type="text" name="txtName" id="txtName" /></td>
<?php
include_once('../connect.php');
$query="select department_id,department_name from department";
$query_result=mysql_query($query);
echo "<td><select id='listDepartment' name='listDepartment'>";
echo "<option value='0'>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['department_id']."'>".$result['department_name']."</option>";
}
echo "</select></td></tr></table>";
?>
<p id="target"></p>
	</div>
</article>
</section>
</body>
</html>