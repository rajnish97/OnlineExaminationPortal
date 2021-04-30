<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();		
$semester=$_SESSION["semester"];
$q="select * from exam where semester=$semester and date=CURRENT_DATE";
$q1=mysqli_query($conn,$q);
$q2=mysqli_query($conn,$q);
?>
<html>
<head>
<style>
body {
  margin: 0;
  background-color:#214640;
  font-family: "Roboto", sans-serif;
}
.header {
    background-color: #22BACA;
    padding: 1px;
    text-align: center;
}
.selection {
	background-color: #1a1aff;
	height: 50px; 
	width: 400px;
	font-size:25px;
}
.selection:hover {
	background-color: #6666ff;
}
.submitbtn {
	float:right; 
	margin-right:50px; 
	margin-top:200px; 
	height: 50px; 
	width:150px; 
	background-color:#208000;
}
.submitbtn:hover {
	background-color: #9fff80;
	cursor: pointer;
}
</style>
</head>
<body>
	<div class="header">
		<h1>EXAM CENTER </h1>
		<a href="student-profile.php" style="text-decoration: none;">
			<img src="Images/arrow.png" style="transform: rotate(180deg);height: 20px;width: 30px;float: left;">
			<p style="text-align:left;color: black;"><b>Back to profile</b></p>
		</a>		
	</div>
	<br>
<?php 
	$row=mysqli_fetch_assoc($q1);
	if($row==0) 
	{
		echo '<h2 align="center"><font color="white" >No Upcomming exams available</font></h2>';
	}
	else
	{	
		echo '<h2 align="center"><font color="#22BACA">Select Paper Name</font></h2>
				<form action="give-exam-helper.php" method="post" align="center" >
				<select name="paperid" class="selection">
				<option>Select Paper Name</option>';

		while($row=mysqli_fetch_assoc($q2)) 
		{
			echo '<option value='.$row['paper_id'].'><p style="color: black;font-size: 20px;">'.$row['paper_name'].'</p></option>';
		}
		echo '</select><br><br><br><br>
			<input class="submitbtn" type="submit" name="submit" value="Proceed"/>
			</form>';
	}
?>
</body>
</html>