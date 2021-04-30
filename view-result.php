<html>
<head>
<link rel="stylesheet" href="header.css">
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
</style>
</head>
<body>
<div class="fixed-header">
		<a href="index.php"><h3 class="title">ONLINE EXAMINATION SYSTEM</h3></a>
		<?php
			session_start();
			if(isset($_SESSION["id"]) && $_SESSION["accounttype"]=="student")
			{
				echo '<div class="dropdown">
  						<button onclick="myFunction()" class="dropbtn">&nbsp&nbsp'.$_SESSION["firstname"].'&nbsp&nbsp</button>
  							<div id="myDropdown" class="dropdown-content">
  							<a href="student-profile.php">Profile</a>';
    			echo '<a href="logout.php">Log Out</a>
  							</div>
					  </div>';
			}
			else
			{
				$_SESSION["redirect"]="view-result.php";
				header('Location: http://localhost/OnlineExaminationSystem/student-login.php');
			}
		?>
</div>
<br><br><br><br><br><br><br><br>
<?php
$conn=mysqli_connect('localhost','root','','exam');
$x=$_SESSION["id"];
$q="select e.paper_id,e.paper_name,e.marks,r.total_marks from result r JOIN(exam e) where e.paper_id=r.paper_id and r.user_id='$x'";
$q1=mysqli_query($conn,$q);
$q2=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($q1);
if($row==0)
{
	echo '<h2 align="center"><font color="white">No exam given yet !!!</font></h2>';
}
else
{
	echo '<table align="center"> 
			<th>Paper Id</th>
			<th>Paper Name</th>
			<th>Marks Obtained</th>
			<th>Total Marks</th>';
	while($row=mysqli_fetch_assoc($q2))
	{
		echo '<tr>
		<td>'.$row['paper_id'].'</td>
		<td>'.$row['paper_name'].'</td>
		<td>'.$row['total_marks'].'</td>
		<td>'.$row['marks'].'</td>
		</tr>';
	}
}
?>
</body>
</html>