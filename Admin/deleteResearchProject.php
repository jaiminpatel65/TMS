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
if(isset($_GET['research_project_id'])){
	$research_project_id=$_GET['research_project_id'];
	$query="delete from research_project where research_project_id=".$research_project_id;
	$query_result=mysql_query($query);
}

?>
<script type="text/javascript">
$(document).ready(function(){
	location.href="adminHome.php";
});
</script>