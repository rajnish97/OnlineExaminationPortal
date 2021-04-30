<?php 
$conn=mysqli_connect('localhost','root','','exam');
$q="select * from exam";
$q1=mysqli_query($conn,$q);
?>
<html>
<head>
<link rel="stylesheet" href="header.css">
<script type="text/javascript" src="header.js"></script>
<style>
body {
  margin: 0;
  font-family: "Roboto", sans-serif;
  background-color:#214640;
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
	
	<table align="center">
		<th>Paperid</th>
		<th>Papername</th>
		<th>Semester</th>
		<th>Date</th>
		<th>Start time</th>
		<th>End time</th>
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
		<?php }?>
	</table>
</body>
</html>