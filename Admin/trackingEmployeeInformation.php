<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
include('hed.php');
?>
<html>
	<script src="../jquery/jquery-1.1.4.js"></script>
	<script type="text/javascript" >
	$(document).ready(function(){
		var name = $("#txtName");
		var departmentId=$("#listDepartment");
		var gender=$("#listGender");
		var categoryId=$("#listCategoryId");
		var maritalStatus=$("#listMaritalStatus");
		if(departmentId=="---")
		{
			departmentId="";
		}
		if(gender=="---")
		{
			gender="";
		}
		if(categoryId=="---")
		{
			categoryId="";
		}
		if(maritalStatus=="---")
		{
			maritalStatus="";
		}
		 $("#txtName").keyup(function(){
			$.ajax({
                type: "post"
				, url: "getTrackingEmployeeInformation.php"
                ,data: "name="+name.val()+"&departmentId="+departmentId.val()+"&gender="+gender.val()+"&categoryId="+categoryId.val()+"&maritalStatus="+maritalStatus.val(),
                success: function(msg) {
					$("#find_target").html ("<p>" + msg + "</p>").fadeIn("slow");
                }
			});
		 });
		  $(".link").live("click", function(){
			 var temp_id=$(this).attr('id');
			 location.href="employeeInformation.php?employeeId="+temp_id;
		  });
		  $("#listDepartment").click(function(){
			$.ajax({
                type: "post"
				, url: "getTrackingEmployeeInformation.php"
                ,data: "name="+name.val()+"&departmentId="+departmentId.val()+"&gender="+gender.val()+"&categoryId="+categoryId.val()+"&maritalStatus="+maritalStatus.val(),
                success: function(msg) {
					$("#find_target").html ("<p>" + msg + "</p>").fadeIn("slow");
                }
			});
		  });
		  $("#listGender").click(function(){
			$.ajax({
                type: "post"
				, url: "getTrackingEmployeeInformation.php"
                ,data: "name="+name.val()+"&departmentId="+departmentId.val()+"&gender="+gender.val()+"&categoryId="+categoryId.val()+"&maritalStatus="+maritalStatus.val(),
                success: function(msg) {
					$("#find_target").html ("<p>" + msg + "</p>").fadeIn("slow");
                }
			});
		  });
		  $("#listCategoryId").click(function(){
			$.ajax({
                type: "post"
				, url: "getTrackingEmployeeInformation.php"
                ,data: "name="+name.val()+"&departmentId="+departmentId.val()+"&gender="+gender.val()+"&categoryId="+categoryId.val()+"&maritalStatus="+maritalStatus.val(),
                success: function(msg) {
					$("#find_target").html ("<p>" + msg + "</p>").fadeIn("slow");
                }
			});
		  });
		  $("#listMaritalStatus").click(function(){
			$.ajax({
                type: "post"
				, url: "getTrackingEmployeeInformation.php"
                ,data: "name="+name.val()+"&departmentId="+departmentId.val()+"&gender="+gender.val()+"&categoryId="+categoryId.val()+"&maritalStatus="+maritalStatus.val(),
                success: function(msg) {
					$("#find_target").html ("<p>" + msg + "</p>").fadeIn("slow");
                }
			});
		  });
	});
	</script>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Tracking Employee Information</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Employee Information</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<tr><td><input type="text" id="txtName" name="txtName" /></td>
<?php
include_once('../connect.php');
$query="select department_id,department_name from department";
$query_result=mysql_query($query);
echo "<td><select id='listDepartment' name='listDepartment'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['department_id']."'>".$result['department_name']."</option>";
}
echo "</select></td>";
?>
<td><select id="listGender" name="listGender">
	<option value="">---</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select></td>
<?php
$query="select category_id,category from social_category";
$query_result=mysql_query($query);
echo "<td><select id='listCategoryId' name='listCategoryId'>";
echo "<option value=''>---</option>";
while($result=mysql_fetch_array($query_result))
{
	echo "<option value='".$result['category_id']."'>".$result['category']."</option>";
}
echo "</select></td>";
?>
<td><select id='listMaritalStatus' name='listMaritalStatus'>
	<option value=''>---</option>
	<option value='Married'>Married</option>
	<option value='UnMarried'>UnMarried</option>
</select></td></tr></table></div>
<p id="find_target"></p> 
</article>
</section>
</body>
</html>