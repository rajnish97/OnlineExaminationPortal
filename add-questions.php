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
		
	<form action="add-questions-helper.php" method="post" align="center">
		<select name='papername' class="selection">
		<option>Select Paper Name</option>
		<?php
			while($row=mysqli_fetch_assoc($q1)) {?>
			<option value="<?php echo $row['paper_id'] ?>"><?php echo $row['paper_name'] ?></option>";
			<?php
			}
		?>
		</select>
		<br><br><br><br>
		<input class="submitbtn" type="submit" name="submit" value="Add question" />
	</form>
</body>
</html>