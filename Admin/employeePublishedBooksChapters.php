<?php
		include_once('../connect.php');
		
	if(isset($_POST['txtisbn_no']) || isset($_POST['txtchapter_name']) || isset($_POST['radiobookchapter']) || isset($_POST['txtno_of_page']) || isset($_POST['txtedition']) || isset($_POST['txtpublisher']) || isset($_POST['txtco_author']) || isset($_POST['txtdate_publication'])|| isset($_POST['api_score']) ||  isset($_POST['txtprice']))
{		

		$isbnno=$_POST['txtisbn_no'];
		$cnm=$_POST['txtchapter_name'];
		$bch=$_POST['radiobookchapter'];
		$nopg=$_POST['txtno_of_page'];
		$edition=$_POST['txtedition'];
		$pub=$_POST['txtpublisher'];
		$coauth=$_POST['txtco_author'];
		$dtpub=$_POST['txtdate_publication'];
		$apiscore=$_POST['api_score'];
		$price=$_POST['txtprice'];
		$eid=$_POST['employeeId'];
}
else
{
	 	header('Location:../Admin/formEmployeePublishedBooksChapters.php'); 
}
if(($isbnno!="") || ($cnm!="") || ($bch!="") || ($nopg!="") || ($edition!="") || ($pub!="") || ($coauth!="") || ($dtpub!="") || ($price!="") ) 
{
					
		$query="INSERT INTO employee_published_books_chapters(`employee_published_books_id` ,`employee_id` ,`ISBN_no` ,`book_chapter_name` ,`book_or_chapter` ,`publisher` ,`co_authors` ,`date_of_publication` ,`price` ,`no_of_page` ,`edition` ,`API_score`)VALUES (NULL ,  '".$eid."',  '".$isbnno."','".$cnm."','".$bch."','".$pub."','".$coauth."','".$dtpub."','".$price."','".$nopg."','".$edition."','".$apiscore."')";

		$query_result=mysql_query($query);
}
else
{
	 		 	header('Location:../Admin/formEmployeePublishedBooksChapters.php');
}

?>