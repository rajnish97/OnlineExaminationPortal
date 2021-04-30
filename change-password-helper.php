<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$old=$_POST['old'];
$new=$_POST['new'];
$id=$_SESSION["id"];
if($_SESSION["accounttype"]=="admin")
{
	$q=mysqli_query($conn,"select * from admin where uid='$id'");
}
else
{
	$q=mysqli_query($conn,"select * from student where user_id='$id'");
}

$q1=mysqli_fetch_assoc($q);
if($old==$q1['password'])
{
	if($_SESSION["accounttype"]=="admin")
	{
		mysqli_query($conn,"update admin set password='$new' where uid='$id'");
	}
	else
	{
		mysqli_query($conn,"update student set password='$new' where user_id='$id'");
	}
	$_SESSION["info"]="Password Changed";
}
else
{
	$_SESSION["info"]="Wrong Old Password";
}
header('Location: http://localhost/OnlineExaminationSystem/change-password.php');
	