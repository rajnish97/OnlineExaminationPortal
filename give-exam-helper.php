<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();	
$user=$_SESSION["firstname"];	
$x=$_POST['paperid'];
$q1=mysqli_query($conn,"select * from exam where paper_id='$x'");
$row1=mysqli_fetch_assoc($q1);
$_SESSION["paperid"]=$x;
date_default_timezone_set('Asia/Calcutta');
$time=date("H:i:s");
$diff=strtotime($row1['start_time'])-strtotime($time);
?>
<html>
<head>
<script type="text/javascript">
var x = setInterval(function() {
  var hours = Math.floor(distance /3600);
  var minutes = Math.floor((distance % 3600) / 60);
  var seconds = Math.floor((distance % 3600) % 60);
  if(distance>=0)
		{
		document.getElementById("demos").innerHTML = "EXAM WILL START IN";}
		document.getElementById("demo").innerHTML =hours + "h "
		+ minutes + "m " + seconds + "s ";
		if(distance==0)
		{
			clearInterval(x);
		
		window.location="examination.php";
		}
	else if (distance < 0) {
		
		document.getElementById("demo").innerHTML = "EXAM OVER!!!";
	}
  distance--;
}, 1000);
</script>
<style>
body {
  margin: 0;
  background-color:#214640;
}
.header {
    background-color: #22BACA;
    padding: 1px;
    text-align: center;
}
</style>
</head>
<body>
	<div class="header">
		<h1>EXAM CENTER </h1>
		<a href="student-profile.php" style="text-decoration: none;">
			<img src="Images/arrow.png" style="transform: rotate(180deg);height: 20px;width: 30px;float: left;">
			<p style="text-align:left;color: black;"><b>Back to profile</b></p>
		</a>		
	</div>
	<br><br>
<script type="text/javascript">
var distance = <?php echo $diff;?>;
</script>
<h1 id="head1"></h1>
	<p id="demos" style="font-size:50px;color:#22BACA;text-align:center;"></p>
	<p id="demo" style="font-size:50px;color:#22BACA;text-align:center;"></p>
</body>
</html>