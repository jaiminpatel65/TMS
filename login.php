<?php
	include_once('connect.php');
	$uname=$_POST['uname'];
	$password=$_POST['password'];
	$query="select l.login_id,l.login_password,ls.status,ls.counter,ur.role_id,ls.reason
		from login l, login_status ls,uesr_role ur
		where l.login_id=ls.login_id and l.login_id=ur.login_id and l.login_id='".$uname."' and l.login_password='".$password."'";
	$query_result=mysql_query($query);
	if($result=mysql_fetch_array($query_result))
	{
		if($uname==$result['login_id'] && $password==$result['login_password'])
		{
		if($result['status']=="on")
		{
		if($result['counter']!=5)
		{
			session_start();
			$_SESSION['login_id']=$result['login_id'];
			$_SESSION['status']=$result['status'];
			$_SESSION['counter']=$result['counter'];
			$_SESSION['role_id']=$result['role_id'];
			echo "1";
		}else{
			echo "Login more than 5 time.";
		}
		}
		else if($result['reason']=="first")
		{
			session_start();
			$_SESSION['login_id']=$result['login_id'];
			$_SESSION['reason']=$result['reason'];
			$_SESSION['role_id']=$result['role_id'];
			echo "2"; 
		}
		else{
			echo "Login account status is not Activate.";
		}
		}
		else{
			echo "The login id or password you entered is incorrect.!";
		}
	}else{
		echo "The login id or password you entered is incorrect.";
	}	
?>