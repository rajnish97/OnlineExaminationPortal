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
	height: 30px; 
	width: 90px; 
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
			session_start();
			if(isset($_SESSION["firstname"]))
			{
				echo '<div class="dropdown">
  						<button onclick="myFunction()" class="dropbtn">&nbsp&nbsp'.$_SESSION["firstname"].'&nbsp&nbsp</button>
  							<div id="myDropdown" class="dropdown-content">';
  							if($_SESSION["accounttype"]=="admin")
    							echo '<a href="admin-profile.php">Profile</a>';
    						else
    							echo '<a href="student-profile.php">Profile</a>';
    			echo '<a href="logout.php">Log Out</a>
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
	<?php
		if(isset($_SESSION["info"]))
		{
			echo '<p style="text-align:center; color: red;">'.$_SESSION["info"].'<p>';
			unset($_SESSION['info']);
		}
	?>
	<div align="center">
		<form action="change-password-helper.php" method="post">
			<input type="text" placeholder="Old Password" name="old" style="height:40px; width: 250px;"><br><br>
			<input type="text" placeholder="New Password" name="new" style="height:40px; width: 250px;"><br><br>
			<input class="submitbtn" type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
	