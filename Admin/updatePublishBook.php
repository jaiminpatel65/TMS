<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$employee_published_books_id=$_GET['employee_published_books_id'];
if($employee_published_books_id==""){
	header('Location:adminHome.php');
}
include_once('../connect.php');
$query="select *  from employee_published_books_chapters where employee_published_books_id=".$employee_published_books_id;
$query_result=mysql_query($query);
if(!$result=mysql_fetch_array($query_result)){
	header('Location:adminHome.php');
}
include('hed.php');
?>
<html>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Published Book</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Published Book</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">

<form action="savePublishBook.php" method="post">
<input type="hidden" id="txtId" name="txtId" value="<?php echo $employee_published_books_id; ?>">
<tr><td>ISBN No. </td><td> <input type="text" name="txtISBNNo" id="txtISBNNo" value="<?php echo $result['ISBN_no']; ?>"></td></tr>
<tr><td>Book/Chapter Name</td><td> <input type="text" name="txtName" id="txtName" value="<?php echo $result['book_chapter_name']; ?>"></td></tr>
<tr><td>Book/Chapter </td><td> 
<select name="listType">
<option value="0"> -- </option>
<option value="Book"> BOOK </option>
<option value="Chapter"> CHAPTER </option>
</select></td></tr>
<tr><td>Publisher </td><td><input type="text" name="txtPublisher" value="<?php echo $result['publisher']; ?>"></td></tr>
<tr><td>Co-Auther </td><td><input type="text" name="txtCoAuther" value="<?php echo $result['co_authors']; ?>"></td></tr>
<tr><td>Date of Publication</td><td> <input type="date" name="txtDate" value="<?php echo $result['date_of_publication']; ?>" ></td></tr>
<tr><td>Price</td><td><input type="text" name="txtPrice" value="<?php echo $result['price']; ?>"></td></tr>
<tr><td>No Of Page </td><td> <input type="text" name="txtPage" value="<?php echo $result['no_of_page']; ?>"></td></tr>
<tr><td>Edition</td><td> <input type="text" name="txtEdition" value="<?php echo $result['edition']; ?>"></td></tr>
<tr><td>API Score</td><td><input type="text" name="txtAPIScore" value="<?php echo $result['API_score']; ?>"></td></tr>
<tr><td><input type="submit" value="Save" >  <input type="reset" class="formbutton" value="Cancal" ></td></tr>
</form> 
</table>
		</div>
</article>
</section>
</body>
</html>