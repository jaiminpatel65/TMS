<html> 
<head>
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
</head>
<body>
<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Website Admin</a></h1>
			<h2 class="section_title">I.S.T.A.R.</h2><div class="btn_view_site"><a href="http://www.medialoot.com">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
<section id="secondary_bar">
		<div class="user">
			<p></p>
			
		</div>
	</section>
	<aside id="sidebar" class="column">
		
		<h3>Content</h3>
		<ul class="toggle">
			<li><a href="adminHome.php">Admin Home</a></li>
			<li><a href="createUser.php">Create User</a></li>
		</ul>
		
		<h3>Insert Record</h3>
		<ul class="toggle">
			
			<li><a href="formEmployeePublishPaper.php?employeeId=<?php echo $employee_id ?>" >Published Paper</a></li>
			<li><a href="formEmployeeResearchProject.php?employeeId=<?php echo $employee_id ?>" >Research Project</a></li>
			<li><a href="formEmployeePresentedPaper.php?employeeId=<?php echo $employee_id ?>" >Presented Paper</a></li>
			<li><a href="formEmployeePublishedBooksChapters.php?employeeId=<?php echo $employee_id ?>" >Published Book/Chapter</a></li>
			<li><a href="formEmployeeParticipation.php?employeeId=<?php echo $employee_id ?>" >Participation</a></li>
			<li><a href="formMeetingAttended.php?employeeId=<?php echo $employee_id ?>" >Meeting Attended</a></li>
			<li><a href="formDeliveredLactures.php?employeeId=<?php echo $employee_id ?>" >Delivered Lectures</a></li>
			<li><a href="formAward.php?employeeId=<?php echo $employee_id ?>" >Award</a></li>
			<li><a href="formExaminationDuties.php?employeeId=<?php echo $employee_id ?>" >Examination Duties</a></li>
			<li><a href="formInvitedAsResourcePerson.php?employeeId=<?php echo $employee_id ?>" >Invited As Resource Person</a></li>
			<li><a href="formEmployeeMembership.php?employeeId=<?php echo $employee_id ?>" >Membership</a></li>
			<li><a href="formOthersActivity.php?employeeId=<?php echo $employee_id ?>" >Other Activity</a></li>
			<li></li>
			<li><a href="getEmployeeId.php" ><b>Back to Employee List</b></a></li>
		</ul>
		
		<h3>Report</h3>
		<ul class="toggle">
			<li><a href="trackingEmployeeInformation.php">Tracking Employee Information</a></li>
			<li><a href="trackingDepartmentInformation.php">Tracking Department Information</a></li>
			<li><a href="trackingInstituteInformation.php">Tracking Institute Information</a></li>
			<li><a href="../logout.php">Logout</a></li>
		</ul>
	</aside><!-- end of sidebar -->
</body>
</html>