<?php
$x=$_POST['username'];
$y=$_POST['password'];

$conn=mysqli_connect('localhost','root','','exam');
$q="select * from admin where uid='$x'";
$q1=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($q1);
$name='none';
if($row['password']==$y)
{	echo $row['password'];
	echo $y;
	session_start();
	session_unset();

	$_SESSION["id"]=$row["uid"];
	$_SESSION["firstname"]=$row['first_name'];
	$_SESSION["accounttype"]="admin";
	
	header('Location: http://localhost/OnlineExaminationSystem/admin-profile.php');
}
else
{
	session_start();
	$_SESSION["loginerror"]='username or password is incorrect';

	header('Location: http://localhost/OnlineExaminationSystem/admin-login.php');
}
?>