<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();
if(isset($_POST['submit']))
$x=$_POST['papername'];
else
$x=$_SESSION['paper'];	
$_SESSION['paper']=$x;
$q1="select * from question where paper_id='$x'";
$q2=mysqli_query($conn,$q1);
$q3=mysqli_query($conn,$q1);
?>
<html>
<head>
<link rel="stylesheet" type="text/css"  href="header.css">
<script type="text/javascript" src="header.js"></script>
<style>
body {
  margin: 0;
  background-color:#214640;
  font-family: "Roboto", sans-serif;
}
table {
  width: 80%;
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
.submitbtn {
	float:left; 
	margin-left: 85px;
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
	<div class="fixed-header">
		<a href="index.php"><h3 class="title">ONLINE EXAMINATION SYSTEM</h3></a>
		<?php
			if(isset($_SESSION["firstname"]))
			{
				echo '<div class="dropdown">

  						<button onclick="myFunction()" class="dropbtn">'.$_SESSION["firstname"].'</button>
  							<div id="myDropdown" class="dropdown-content">
    							<a href="admin-profile.php">Profile</a>
    							<a href="logout.php">Log Out</a>
  							</div>
					  </div>';
			}
			else
			{
				header('Location: http://localhost/OnlineExaminationSystem/admin-login.php');
			}
		?>
	</div>
	<br><br><br><br><br><br>
		
<form action="add-questions-helper1.php" method="post">
<p style="margin-left:30px"><font color="#22BACA">Question Id: </font><input type="text" name="qid" required></br></br>
<font color="#22BACA">Question: </font><input type="text" name="ques" style="height:50px;width:500px;margin-left:16px;" required></br></br>
<font color="#22BACA">Option A: </font><input type="text" name="opta" style="margin-left:14px;" required></br></br> 
<font color="#22BACA">Option B: </font><input type="text" name="optb" style="margin-left:14px;" required></br></br> 
<font color="#22BACA">Option C: </font><input type="text" name="optc" style="margin-left:14px;" required></br></br> 
<font color="#22BACA">Option D: </font><input type="text" name="optd" style="margin-left:14px;" required></br></br> 
<font color="#22BACA">Answer: </font><input type="text" name="ans" style="margin-left:24px;" required><br><br><br>
<input class="submitbtn" type="submit" value="Submit"></p>
</form>
<br><br><br>
<h2 align="center"><font color="#22BACA"><u>Added Questions </u></font></h2>

	<?php $row=mysqli_fetch_assoc($q2);
	if($row==0) {?>
		<h2 align="center"><font color="white" >No questions added yet</font></h2>
		
	<?php }
	else{
	?>
	<table align="center">
		<th>QuestionId</th>
		<th>PaperId</th>
		<th>Question</th>
		<th>Option A</th>
		<th>Option B</th>
		<th>Option C</th>
		<th>Option D</th>
		<th>Answer</th>
		<?php while($row=mysqli_fetch_assoc($q3)){ ?>
		<tr>
		<td> <?php echo $row['ques_id'] ; ?> </td>
		<td> <?php echo $row['paper_id'] ; ?> </td>
		<td> <?php echo $row['question'] ; ?> </td>
		<td> <?php echo $row['opt_a'] ; ?> </td>
		<td> <?php echo $row['opt_b'] ; ?> </td>
		<td> <?php echo $row['opt_c'] ; ?> </td>
		<td> <?php echo $row['opt_d'] ; ?> </td>
		<td> <?php echo $row['answer'] ; ?> </td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</body>
</html>