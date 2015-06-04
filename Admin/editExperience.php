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
<h4 class="alert_info">Welcome To Update Employee Experience Information</h4>
<article class="module track_full">
<header><h3 class="tabs_involved">Update Employee Experience </h3></header>
<div id="tab1" class="tab_content">
<table cellpadding="5" cellspacing="5">

		<form action="saveExperience.php" method="post">
		 <?php
				include_once('../connect.php');
				$loginTemp="select employee_id from login  where login_id='".$_SESSION['login_id']."'";
				$loginTemp=mysql_query($loginTemp);
				$loginResult=mysql_fetch_array($loginTemp);
				$id=$loginResult['employee_id'];
				$employee_Experience_id=$_GET['employee_experience_id'];
				$query="select ex.employee_experience_id,ex.organization_name, ex.address, ex.city, ex.state, ex.pin_code, ex.phone_no,
				 ex.email_id, ex.website_name, te.type, tnw.type_of_nature_of_work, ex.no_of_months, d.designation_name, 
				 ex.gross_monthly_salary, ex.joining_date, ex.leavin_date, ex.reason_of_leaving
					 from employee_experience ex, type_of_experience te, type_of_nature_of_work tnw,designation d
					 	where ex.type_of_experience_id=te.type_of_experience_id and ex.type_of_nature_of_work_id =tnw.type_of_nature_of_work_id 
						 and ex.designation_id=d.designation_id and ex.employee_id=".$id." and ex.employee_experience_id=".$employee_Experience_id;
				
				$query_result=mysql_query($query);
			/*	echo "dfdss".$query;
				
				if(!$result=mysql_fetch_array($query_result))
				{
					
				}*/
						
		?>
		<input type="hidden" id="txtemployee_id" name="txtemployee_id" value="<?php echo $id ?>">
		<input type="hidden" id="txtexperience_id" name="txtexperience_id" value="<?php echo $employee_Experience_id ?>"/>
		
		<tr><td>Organization</td><td> <input type="text" name="txtorganization" id="txtorganization" value="<?php echo $result['organization_name'];?>"/></td></tr>
		<tr><td>Address</td><td> <textarea name="txtaddress" id="txtaddress" value="<?php echo $result['address'];?>"></textarea></td></tr>
		<tr><td>City</td><td> <input type="text" name="txtcity" id="txtcity" value="<?php echo $result['city'];?>"/></td></tr>
		<tr><td>State</td><td> <input type="text" name="txtstate" id="txtstate" value="<?php echo $result['state'];?>"/></td></tr>
		<tr><td>Pin Code</td><td><input type="text" name="txtpincode" id="txtpincode" value="<?php echo $result['pin_code'];?>"/></td></tr>
		<tr><td>Phone No.</td><td><input type="text" name="txtphoneno" id="txtphoneno" value="<?php echo $result['phone_no'];?>"/></td></tr>
		<tr><td>Email ID</td><td><input type="text" name="txtemailid" id="txtemailid" value="<?php echo $result['email_id'];?>"/></td></tr>
		<tr><td>Website Name</td><td><input type="text" name="txtwebsite" id="txtwebsite" value="<?php echo $result['website_name'];?>"/></td></tr>
		<tr><td>Experience Type</td><td> 
		<?php 
				$temp="select type_of_experience_id,type from type_of_experience";
				$temp=mysql_query($temp);
				echo "<select id='listExperienceType' name='listExperienceType'>";
				echo "<option value='0'>---</option>";
				while($rtemp=mysql_fetch_array($temp))
				{
					echo "<option value='".$rtemp['type_of_experience_id']."'>".$rtemp['type']."</option>";
				}
			
				echo "</select></td></tr>";		
		?>
		<tr><td>Type of Nature of Work</td><td>
		<?php 
				$temp="select type_of_nature_of_work_id,type_of_nature_of_work from type_of_nature_of_work";
				$temp=mysql_query($temp);
				echo "<select id='listNatureWorkType' name='listNatureWorkType'>";
				echo "<option value='0'>---</option>";
				while($rtemp=mysql_fetch_array($temp))
				{
					echo "<option value='".$rtemp['type_of_nature_of_work_id']."'>".$rtemp['type_of_nature_of_work']."</option>";
				}
			
				echo "</select></td></tr>";		
		?>
		<tr><td>Designation</td><td>
		<?php 
				$temp="select designation_id,designation_name from designation";
				$temp=mysql_query($temp);
				echo "<select id='listDesignation' name='listDesignation'>";
				echo "<option value='0'>---</option>";
				while($rtemp=mysql_fetch_array($temp))
				{
					echo "<option value='".$rtemp['designation_id']."'>".$rtemp['designation_name']."</option>";
				}
			
				echo "</select></td></tr>";		
		?>
		<tr><td>Salary</td><td><input type="text" name="txtsalary" id="txtsalary" value="<?php echo $result['gross_monthly_salary'];?>"/></td></tr>
		<tr><td>Joining Date</td><td><input type="date" name="jdate" id="jdate" value="<?php echo $result['joining_date'];?>"/></td></tr>
		<tr><td>Leaving Date</td><td><input type="date" name="lgate" id="ldate" value="<?php echo $result['leavin_date'];?>"/></td></tr>
		<tr><td>Reason of Leaving</td><td><textarea name="txtreason" id="txtreason" value="<?php echo $result['reason_of_leaving'];?>"></textarea></td></tr>
		
		
		<tr><td><input type="submit" id="btnsave" value="Save"/>
		<input type="button" class="formbutton" id="btncancel" value="Cancel"/></td></tr>
		</form>
		</table>
		</div>
</article>
</section>
</body>
</html>