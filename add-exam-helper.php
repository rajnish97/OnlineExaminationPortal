<?php 
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$id=$_POST['paperid'];
$name=$_POST['pname'];
$sem=$_POST['sem'];
$date=$_POST['edate'];
$time=$_POST['etime'];
$times=$_POST['eftime'];
$marks=$_POST['marks'];
$q="insert into exam values('$id','$name',$sem,'$date','$time',$marks,'$times')";
mysqli_query($conn,$q);
header('Location: http://localhost/OnlineExaminationSystem/add-exam.php');
?>