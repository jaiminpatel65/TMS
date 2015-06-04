<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
$id=$_POST['txtId'];
$txtISBNNo=$_POST['txtISBNNo'];
$txtName=$_POST['txtName'];
$listType=$_POST['listType'];
$txtPublisher=$_POST['txtPublisher'];
$txtCoAuther=$_POST['txtCoAuther'];
$txtDate=$_POST['txtDate'];
$txtPrice=$_POST['txtPrice'];
$txtPage=$_POST['txtPage'];
$txtEdition=$_POST['txtEdition'];
$txtAPIScore=$_POST['txtAPIScore'];
include_once('../connect.php');
$query="update employee_published_books_chapters set ISBN_no='".$txtISBNNo."',book_chapter_name='".$txtName."',book_or_chapter='".$listType."',
	publisher='".$txtPublisher."',
	co_authors='".$txtCoAuther."',date_of_publication='".$txtDate."',price=".$txtPrice.",no_of_page=".$txtPage.",
	edition=".$txtEdition.",API_score=".$txtAPIScore." where employee_published_books_id=".$id;
$query_result=mysql_query($query);
?>
<html>
<head>
	<script src="../jquery/jquery-1.1.4.js"></script>
	<script type="text/javascript" >
		$(document).ready(function(){
			location.href="adminHome.php";
		});
	</script>
</head>