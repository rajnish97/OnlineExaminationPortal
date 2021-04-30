<?php 
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$id=$_POST['qid'];
$que=$_POST['ques'];
$ans=$_POST['ans'];
$a=$_POST['opta'];
$b=$_POST['optb'];
$c=$_POST['optc'];
$d=$_POST['optd'];
$x=$_SESSION['paper'];
$q="insert into question values('$id','$x','$que','$a','$b','$c','$d','$ans')";
mysqli_query($conn,$q);
header('Location: http://localhost/OnlineExaminationSystem/add-questions-helper.php');
?>

