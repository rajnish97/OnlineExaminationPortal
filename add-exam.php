<?php 
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$q="select * from exam";
$q1=mysqli_query($conn,$q);
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
.submitbtn {
	float: right;
	margin-right: 210px;
	height: 50px; 
	width:150px; 
	background-color:#208000;
}
.submitbtn:hover {
	background-color: #9fff80;
	cursor: pointer;
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
			if(isset($_SESSION["firstname"]))
			{
				echo '<div class="dropdown">

  						<button onclick="myFunction()" class="dropbtn">&nbsp&nbsp'.$_SESSION["firstname"].'&nbsp&nbsp</button>
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
	<br><br><br><br><br><br><br><br>
		
	<form method="post" action="add-exam-helper.php" enctype="multipart/form-data" >
	<table align="center">
		<tr>
			<td align="center" bgcolor="#22BACA" colspan="6"><h1>ENTER PAPER DETAILS HERE<h1></td>
		</tr>
		
		<tr>
			<td align="right" bgcolor="white" >Paper Id:</td>
			<td><input type="text" name="paperid" size="30" required></td>
		</tr>

		<tr>	
			<td align="right" bgcolor="white">Paper Name:</td>
			<td><input type="text" name="pname" size="30" required></td>
		</tr>

		<tr>
			<td align="right" bgcolor="white">Semester:</td>
			<td><input type="number" name="sem" size="30" required></td>
		</tr>

		<tr>
			<td align="right" bgcolor="white">Date:</td>
			<td><input type="date" name="edate" size="30" required></td>
		</tr>
		<tr>
			<td align="right" bgcolor="white">Start Time:</td>
			<td><input type="Time" name="etime" size="30" required></td>
		</tr>
		<tr>
			<td align="right" bgcolor="white">End Time:</td>
			<td><input type="Time" name="eftime" size="30" required></td>
		</tr>
		<tr>
			<td align="right" bgcolor="white">Marks:</td>
			<td><input type="number" name="marks" size="30" required></td>
		</tr>
	</table><br><br>
	<input class="submitbtn" type="submit" name="submit" value="SUBMIT" >
</form><br><br><br><br><br><br>
	<h2 align="center" ><font color="black">Created Exams</font></h2>
	<table  align="center">
		<th>Paperid</th>
		<th>Papername</th>
		<th>Semester</th>
		<th>Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Total marks</th>
		<?php while($row=mysqli_fetch_assoc($q1)){ ?>
		<tr>
		<td> <?php echo $row['paper_id'] ; ?> </td>
		<td> <?php echo $row['paper_name'] ; ?> </td>
		<td> <?php echo $row['semester'] ; ?> </td>
		<td> <?php echo $row['date'] ; ?> </td>
		<td> <?php echo $row['start_time'] ; ?> </td>
		<td> <?php echo $row['end_time'] ; ?> </td>
		<td> <?php echo $row['marks'] ; ?> </td>
		</tr>
		<?php } ?>
	</table>
	<br><br>
</body>
</html>