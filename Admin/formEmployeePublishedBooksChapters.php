<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	include_once('logout.php');  
}
if(isset($_GET['employeeId']))
{
	$employee_id=$_GET['employeeId'];
if($employee_id=="")
{
	header('Location:getEmployeeId.php'); 
}
}else
{
	header('Location:getEmployeeId.php');
}
include('insertLink.php');
?>
<html>
<title> Published Book/Chapters </title>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Published Book/Chapters</h4>
<article class="module width_full">
<header><h3 class="tabs_involved">Published Book/Chapters</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
<form action="employeePublishedBooksChapters.php" method="post">
					<input type="hidden" id="employeeId" name="employeeId"value="<?php echo $employee_id ?>"/>
 	  <tr><td>Book/Chapter</td><td><input type="radio" id="radiobookchapter" name="radiobookchapter" value="Books" /> Books 
	   				<input type="radio" id="radiobookchapter" name="radiobookchapter" value="Chapters"/> Chapters </td></tr> 
	   <tr><td>Book/Chapter Name</td><td><input type="text" id="txtchapter_name" name="txtchapter_name" /></td></tr>
	   <tr><td>ISBN No.</td><td><input type="text" id="txtisbn_no" name="txtisbn_no" /></td></tr>
	   <tr><td>No of Page</td><td><input type="text" id="txtno_of_page" name="txtno_of_page"  /></td></tr>
	   <tr><td>Edition</td><td><input type="text" id="txtedition" name="txtedition"  /></td></tr>
	   <tr><td>Date of Published</td><td><input type="date" id="txtdate_publication" name="txtdate_publication"  /></td></tr>
	   <tr><td>Co-Author</td><td><input type="text" id="txtco_author" name="txtco_author" /></td></tr>
	   <tr><td>Publisher</td><td><input type="text" id="txtpublisher" name="txtpublisher" /></td></tr>
	   <tr><td>Price</td><td><input type="text" id="txtprice" name="txtprice"  /></td></tr>
	  <tr><td>API Score</td><td><select id="api_score" name="api_score">
				<option value="0"> 0 </option>
				<option value="1">  1 </option>
				<option value="2">  2 </option>
				<option value="3">  3 </option>
				<option value="4">  4 </option>
				<option value="5">  5 </option>
				<option value="6">  6 </option>
				<option value="7">  7 </option>
				<option value="8">  8 </option>
				<option value="9">  9 </option>
				<option value="10"> 10 </option>
				</select></td></tr>
		 <tr><td><input type="submit" id="btnadd" value="Add"/>
	   <input type="reset" class="formbutton" id="btnreset" value="Reset"/></td></tr>
</form>
</table>
		</div>
</article>
</section>
</body>
</html>
