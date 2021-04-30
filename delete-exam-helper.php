<?php 
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$id=$_POST['paperid'];
$q="delete from exam where paper_id='$id'";
mysqli_query($conn,$q);
header('Location: http://localhost/OnlineExaminationSystem/delete-exam.php');
?>