<?php
session_start();
include('hed.php');
?>
<html>
<head>
	<script src="../jquery/jquery-1.1.4.js"></script>
	<script type="text/javascript" >
		$(document).ready(function(){
		$("#btncancel").click(function(){
			location.href="adminHome.php"; 
		});
	});
	</script>
</head>
<body>
<section id="main" class="column">
<h4 class="alert_info">Welcome To Update Employee Qulification Information</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Employee Qulification</h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">
		<form action="saveQualification.php" method="post">
		 <tr><td>Degree</td><?php
				include_once('../connect.php');
				$loginTemp="select employee_id from login  where login_id='".$_SESSION['login_id']."'";
				$loginTemp=mysql_query($loginTemp);
				$loginResult=mysql_fetch_array($loginTemp);
				$id=$loginResult['employee_id'];
				$employee_qualification_id=$_GET['employee_qualification_id'];
				$query="select eq.employee_qualification_id,d.degree_name,eq.name_of_board_university
				,eq.name_of_institute,eq.class_grade_division,eq.major_subject_of_degree_thesis_title,						
				eq.passing_year,eq.no_of_attemot,eq.total_marks,eq.obtained_marks
					from employee_qualification eq, degree  d
				where d.degree_id=eq.degree_id and eq.employee_id=".$id." and eq.employee_qualification_id=".$employee_qualification_id;
				$query_result=mysql_query($query);
				
				if(!$result=mysql_fetch_array($query_result))
				{
					
				}
					
					$temp="select degree_id,degree_name from degree";
					$temp=mysql_query($temp);
					echo "<td><select id='listDegree' name='listDegree'>";
					echo "<option value='0'>---</option>";
					while($rtemp=mysql_fetch_array($temp))
					{
					 
						echo "<option value='".$rtemp['degree_id']."'>".$rtemp['degree_name']."</option>";
					}
					
					echo "</select></td></tr>";
				
				
		?>
		<tr><td><input type="hidden" id="txtemployee_id" name="txtemployee_id" value="<?php echo $id ?>"></td>
		<td><input type="hidden" id="txtqualiication_id" name="txtqualiication_id" value="<?php echo $employee_qualification_id ?>"/></td></tr>
		<tr><td>Name of Board/University</td><td><input type="text" name="txtname_of_board_university" id="txtname_of_board_university" value="<?php echo $result['name_of_board_university'];?>"/></td></tr>
		<tr><td>Name of Institute</td><td> <input type="text" name="txtinstitute_name" id="txtinstitute_name" value="<?php echo $result['name_of_institute'];?>" /></td></tr>
		<tr><td>Class/Grade</td><td> <input type="text" name="txtclass_grade" id="txtclass_grade" value="<?php echo $result['class_grade_division'];?>"/></td></tr>
		<tr><td>Major Subject of Degree</td><td> <input type="text" name="txtmajor_subject" id="txtmajor_subject" value="<?php echo $result['major_subject_of_degree_thesis_title'];?>"/></td></tr>
		<tr><td>Passing Year</td><td><input type="text" name="txtpassing_year" id="txtpassing_year" value="<?php echo $result['passing_year'];?>"/></td></tr>
		<tr><td>No. of attempt</td><td><input type="text" name="txtno_of_attempt" id="txtno_of_attempt" value="<?php echo $result['no_of_attemot'];?>"/></td></tr>
		<tr><td>Total Marks</td><td><input type="text" name="txttotal_mark" id="txttotal_mark" value="<?php echo $result['total_marks'];?>"/></td></tr>
		<tr><td>Obtained Marks</td><td><input type="text" name="txtObtained_mark" id="txtObtained_mark" value="<?php echo $result['obtained_marks'];?>"/></td></tr>
		
		<tr><td><input type="submit" id="btnsave" value="Save"/>
		<input type="button" class="formbutton" id="btncancel" value="Cancel"/></td></tr>
		</form>
		</table>
		</div>
</article>
</section>
</body>
</html>