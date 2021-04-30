<?php
	session_start();
	$accounttype = $_SESSION["accounttype"];
	session_unset();
	session_destroy();
	if($accounttype == "admin")
		header('Location: http://localhost/OnlineExaminationSystem/admin-login.php');
	else
		header('Location: http://localhost/OnlineExaminationSystem/student-login.php');
?>