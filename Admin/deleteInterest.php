<?php
session_start();
if($_SESSION['login_id']=="" || $_SESSION['role_id']!="1" || $_SESSION['status']!="on" || $_SESSION['counter']==5)
{
	header('Location:../index.php'); 
}
?>
<script src="../jquery/jquery-1.1.4.js"></script>
<?php
include_once('../connect.php');
if(isset($_GET['interestId'])){
	$interestId=$_GET['interestId'];
	$query="delete from employee_interest where employee_interest_id=".$interestId;
	$query_result=mysql_query($query);
}

?>
<script type="text/javascript">
$(document).ready(function(){
	location.href="adminHome.php";
});
</script>