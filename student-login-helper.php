<?php
$x=$_POST['username'];
$y=$_POST['password'];
$conn=mysqli_connect('localhost','root','','exam');
$q="select * from student where user_id='$x'";
$q1=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($q1);
$name='none';
if($row['password']==$y)
{	
	session_start();

	$_SESSION["id"]=$x;
	$_SESSION["firstname"]=$row['first_name'];
	$_SESSION["userid"]=$row['user_id'];
	$_SESSION["semester"]=$row['semester'];
	$_SESSION["accounttype"]="student";

	if(isset($_SESSION["redirect"]))
	{
		$redirect=$_SESSION["redirect"];
		unset($_SESSION["redirect"]);
		header('Location: http://localhost/OnlineExaminationSystem/'.$redirect);
	}
	else
	{
		header('Location: http://localhost/OnlineExaminationSystem/student-profile.php');
	}
}
else
{
	session_start();
	$_SESSION["error"]='username or password is incorrect';

	header('Location: http://localhost/OnlineExaminationSystem/student-login.php');
}
?>