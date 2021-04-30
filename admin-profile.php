<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();		
$name=$_SESSION["firstname"];
?>
<html>
<head>
<link rel="stylesheet" type="text/css"  href="header.css">
<script type="text/javascript" src="header.js"></script>
<style>
body {
  margin: 0;
  background-image:url("Images/background1.jpg");
  background-size:100%;
  background-repeat:no-repeat;
  background-position:center;
  font-family: "Roboto", sans-serif;
}
.menu
{
	margin-left:50px;
}
.item
{
	height:75px;
	width: 150px;
	background-color: #808080;
	border: solid black;
}
.menu a
{
	color: #ffffff;
	text-decoration: none;
}
.item p
{	
	margin-top: 27px;
	text-align: center;
}
.item:hover
{
	border: solid #808080;
	background-color: #000000;
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
    							<a href="change-password.php">Change Password</a>
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
	<div class="menu">
		<a href="add-exam.php">
			<div class="item">
				<p>Add Exam</p>
			</div>
		</a>
		<br><br>
		<a href="add-questions.php">
			<div class="item">
				<p>Add Questions</p>
			</div>
		</a>
		<br><br>
		<a href="delete-exam.php">
			<div class="item">
				<p>Delete Exam</p>
			</div>
		</a>
		<br><br>
		<a href="delete-questions.php">
			<div class="item">
				<p>Delete Questions</p>
			</div>
		</a>
	</div>
</body>
</html>