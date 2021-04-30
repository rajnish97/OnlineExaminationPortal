<?php
$conn=mysqli_connect('localhost','root','','exam');
$first=$_POST['first'];
$last=$_POST['last'];
$pass=$_POST['pass'];
$uid=$_POST['uid'];
$phno=$_POST['phno'];
$email=$_POST['email'];
$sem=$_POST['sem'];

$q="insert into student values('$uid','$first','$last','$pass','$email','$phno','$sem')";
mysqli_query($conn,$q);
header('Location: http://localhost/ecom/student-login.php');
?>