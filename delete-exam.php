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
.deletebtn {
	height: 50px; 
	width:150px; 
	background-color: #ff0000;
}
.deletebtn:hover {
	background-color: #ff9999;
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
	<br><br><br><br><br><br><br><br>
	<form action="delete-exam-helper.php" method="post" align="center">
		<font color="black"><b>Enter Paper Id to delete a exam: </b></font><input type="text" name="paperid" required><br><br><br>
		<input class ="deletebtn" type="submit" value="Delete">
	</form>
	<br><br><br>
	<h2 align="center"><font color="black">Created Exams</font></h2>
	<table align="center">
		<th>Paperid</th>
		<th>Papername</th>
		<th>Semester</th>
		<th>Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Total Marks</th>
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