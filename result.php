<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$id=$_SESSION["id"];
$x=$_SESSION["paperid"];
$q=mysqli_query($conn,"select * from question where paper_id='$x'");
$q2=mysqli_query($conn,"select * from question where paper_id='$x'");
$q3=mysqli_query($conn,"select * from exam where paper_id='$x'");
$sum=0;
?>
<html>
<head>
<link rel="stylesheet" href="header.css">
<script type="text/javascript" src="header.js"></script>
<style>
body {
  margin: 0;
  background-color:#214640;
  font-family: "Roboto", sans-serif;
}
table {
  width: 70%;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(odd){background-color: #ffffff}
tr:nth-child(even){background-color: #d9d9d9}
th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div class="fixed-header">
		<a href="index.php"><h3 class="title">ONLINE EXAMINATION SYSTEM</h3></a>
		<?php
			if(isset($_SESSION["id"]) && $_SESSION["accounttype"]=="student")
			{
				echo '<div class="dropdown">
  						<button onclick="myFunction()" class="dropbtn">&nbsp&nbsp'.$_SESSION["firstname"].'&nbsp&nbsp</button>
  							<div id="myDropdown" class="dropdown-content">
  							<a href="student-profile.php">Profile</a>';
    			echo '<a href="logout.php">Log Out</a>
  							</div>
					  </div>';
			}
			else
			{
				header('Location: http://localhost/OnlineExaminationSystem/student-login.php');
			}
		?>
</div>
<br><br><br><br><br><br><br><br>

<?php
while($row=mysqli_fetch_assoc($q))
{
	$y=$row['ques_id'];
	if(isset($_POST[$y]))
	$z=$_POST[$y];
	else
	$z="NULL";
	$c=0;
	if($row['answer']==$z)
	{
		$c=10;
		$sum=$sum+10;
	}
mysqli_query($conn,"insert into option_choosen(user_id,ques_id,answer,score) values('$id','$y','$z',$c)");}
?>

<div style="margin-left:20px;">
<table align="center">
	<th>Question</th>
	<th>Your Answer</th>
	<th>Correct Answer</th>
	<th>Score</th>
<?php
while($row=mysqli_fetch_assoc($q2))
{
	$y=$row['ques_id'];
	if(isset($_POST[$y]))
	$z=$_POST[$y];
	else
	$z="NA";
	$c=0;
	if($row['answer']==$z)
	{
		$c=10;
	}
	?>
	<tr>
	<td><?php echo $row['question'];?></td>
	<td><?php echo $z;?></td>
	<td><?php echo $row['answer'];?></td>
	<td><?php echo $c;?></td>
	</tr>
<?php
}
mysqli_query($conn,"insert into result(user_id,paper_id,total_marks) values('$id','$x',$sum)");

?>
</table>
</div>
<?php
$row=mysqli_fetch_assoc($q3);
echo '<h2 style="margin-left:20px;text-align:center;"><font color="#22BACA">REMARKS:&nbsp You got '.$sum.' out of '.$row['marks'].'</font></h2>';
?>
</body>
</html>