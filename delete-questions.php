<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$q1="select * from question";
$q2=mysqli_query($conn,$q1);
?>
<html>
<head>
<link rel="stylesheet" type="text/css"  href="Header.css">
<script type="text/javascript" src="Header.js"></script>
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
<form action="delete-questions-helper.php" method="post" align="center">
<font color="black"><b>Enter Question Id to be deleted:  </b></font><input type="text" name="qid" required><br><br><br>
<input class="deletebtn" type="submit" value="Delete">
</form>
<br><br>
<h2 align="center"><font color="black"><b>Added Questions</b></font></h2>
	<table align="center">
		<th>QuestionId</th>
		<th>PaperId</th>
		<th>Question</th>
		<th>Qption A</th>
		<th>Qption B</th>
		<th>Qption C</th>
		<th>Qption D</th>
		<th>Answer</th>
		<?php while($row=mysqli_fetch_assoc($q2)){ ?>
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
	<br><br>
</body>
</html>