<html>
<head>
<link rel="stylesheet" href="index.css">
<script type="text/javascript" src="header.js"></script>
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
				echo '<a href="student-login.php"><img style="float: right;padding-top:10px;padding-right:10px;height:40px;width:80px;" src="Images/login-icon.jpg"></a>';
			}
		?>
</div>
<br><br><br><br><br><br><br><br>
	<div class="menu">
		<a href="exam-schedule.php">
			<div class="item">
				<img src="Images/calendar.png" style="float: left; height: 40px; width: 40px; padding-top: 25px; padding-left: 10px;">
				<p><b>Exam Schedule</b></p>
			</div>
		</a>
		<br><br>
		<a href="view-result.php">
			<div class="item">
				<img src="Images/result.png" style="float: left; height: 40px; width: 40px; padding-top: 25px; padding-left: 40px;">
				<p style="float: left;">&nbsp;<b>Result</b></p>
			</div>
		</a>
	</div>
</body>
</html>