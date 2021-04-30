<?php 
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$id=$_POST['qid'];
$q="delete from question where ques_id='$id'";
mysqli_query($conn,$q);
header('Location: http://localhost/OnlineExaminationSystem/delete-questions.php');
?>