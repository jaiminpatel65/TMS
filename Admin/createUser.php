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
			var department = $("#listDepartment"); 
			var name = $("#txtName"); 
			var loginId=$("#txtLoginId");
			var confirmLoginId=$("#txtConfirmLoginId");
			var role=$("#listRole");
			function checkLoginId(){
				if(loginId.val()==confirmLoginId.val())
					return true;
				else
					return false;
			}
			$("#btnCreate").click(function(){
				if(checkLoginId())
				{
					$.ajax({
					type: "post"
					,url: "create.php"
					,data: "department="+department.val()+"&name="+name.val()+"&loginId="+loginId.val()+"&role="+role.val(),
					success: function(msg) {
					$('#target').hide();
					if(msg=="0")
					{
						$("#target").html ("<p>Someone already has That LoginId. Try another?</p>").fadeIn("slow");
					}
					else if(msg=="1")
					{
						$("#target").html ("<p>LoginId Successful Create.</p>").fadeIn("slow");
					}
					//$("#target").html ("<p>"+msg+"</p>").fadeIn("slow");
					}
					});
				}
				else
				{
					alert("Confirm Login Id and Login Id don't match. Try again?");
				}
			});
		});
	</script>
</head>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Create New User</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Create New User</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form onsubmit="return false;">
<?php
include_once('../connect.php');
$query="select institute_id,institute_name from institute";
$query_result=mysql_query($query);
$result=mysql_fetch_array($query_result);
echo "<tr><td>INSTITUTE</td><td>".$result['institute_name']."</td></tr>";

echo "<tr><td>DEPARTMENT</td>"; 
$query="select department_id,department_name from department";
$query_result=mysql_query($query);
echo "<td><select id='listDepartment' name='listDepartment'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['department_id']."'>".$result['department_name']."</option>";
}
echo "</select></td></tr>";
?>
<tr><td>NAME</td><td><input type="text" name="txtName" id="txtName"/></td></tr>
<tr><td>LOGIN ID</td><td><input type="text" name="txtLoginId" id="txtLoginId"/></td></tr>
<tr><td>CONFIRM LOGIN ID</td><td><input type="text" name="txtConfirmLoginId" id="txtConfirmLoginId" /></td></tr>
<tr><td>USER ROLE</td> 
<?php
$query="select role_id,role_name from role";
$query_result=mysql_query($query);
echo "<td><select id='listRole' name='listRole'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['role_id']."'>".$result['role_name']."</option>";
}
echo "</select></td></tr>";
?>
<tr><td><input type="button" class="formbutton" name="btnCreate" id="btnCreate" value="Create" />
<input type="reset" class="formbutton" name="clear" id="clear" value="Clear" /></td></tr>
</form>
<p id="target"></p>
</table>
</div>
</article>
</section>
</body>
</html>