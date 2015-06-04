<?php
		include_once('../connect.php');
		$eqid=$_POST['txtqualiication_id'];
		$did=$_POST['listDegree'];
		$bname= $_POST['txtname_of_board_university'];
		$iname= $_POST['txtinstitute_name'];
		$class= $_POST['txtclass_grade'];
		$msub= $_POST['txtmajor_subject'];
		$pyear= $_POST['txtpassing_year'];
		$attempt= $_POST['txtno_of_attempt'];
		$tmark= $_POST['txttotal_mark'];
		$omark= $_POST['txtObtained_mark']; 			
		
		$query="UPDATE employee_qualification SET `degree_id`='".$did."',`name_of_board_university`='".$bname."',`name_of_institute`='".$iname."',`class_grade_division`='".$class."',`major_subject_of_degree_thesis_title`='".$msub."',`passing_year`='".$pyear."',`no_of_attemot`='".$attempt."',`total_marks`='".$tmark."',`obtained_marks`='".$omark."' WHERE employee_qualification_id=".$eqid;
				
		$query_result=mysql_query($query);
		header('Location:adminHome.php');
?>