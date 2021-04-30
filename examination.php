<?php
$conn=mysqli_connect('localhost','root','','exam');
session_start();
$user=$_SESSION["firstname"];
$x=$_SESSION["paperid"];
$q=mysqli_query($conn,"select * from question where paper_id='$x'");

$q1=mysqli_query($conn,"select * from exam where paper_id='$x'");
$row1=mysqli_fetch_assoc($q1);
$papername = $row1['paper_name'];
date_default_timezone_set('Asia/Calcutta');
$time=date("H:i:s");
$diff=strtotime($row1['end_time'])-strtotime($time);

$i=1;
?>

<html>
<head>
<title>Exam</title>
<style>
  body {
  margin: 0;
  font-family: "Roboto", sans-serif;
}
.fixed-header {
  top: 0;
  width: 100%;
  position: fixed;
  background: #333;
  color: #fff;
}
.name-and-timer {
  height: 126px;
  width: auto;
  background-color: #8a998a;
  color: #fff;
  font-size: 16px;
  border-top-width: 0px;
  border-right-width: 0px;
  border-bottom-width: 0px;
  border-left: solid;
  border-left-color: black;
  border-left-width: 10px;
}  
.submitbtn {
  height: 50px; 
  width:150px; 
  background-color:#208000;
}
.submitbtn:hover {
  background-color: #9fff80;
  cursor: pointer;
}
#timer {
  color:red;
}
</style>
<script type="text/javascript">
  var x = setInterval(function() {
  var hours = Math.floor(distance /3600);
  var minutes = Math.floor((distance % 3600) / 60);
  var seconds = Math.floor((distance % 3600) % 60);
		document.getElementById("timer").innerHTML = hours + ":"
		+ minutes + ":" + seconds;
	if(distance <0)
	{
		clearInterval(x);
		document.getElementById("form1").submit();
	}
  distance--;
}, 1000);
</script>
</head>
<body style="margin-left: 0px;">
<script>
var distance=<?php echo $diff;?>;
</script>

<div class="fixed-header">
  <div style="float: left;">
      <h4 style="margin-left:10px; color: white; font-size: 20px;">Paper ID: <?php echo $x; ?></h4>
      <h4 style="margin-left:10px; color: white; font-size: 20px;">Paper Name: <?php echo $papername; ?></h4>
  </div>
    <div class="name-and-timer" style="float: right;">
      <h3 style="text-align: center;margin-top: 35px;">&nbsp&nbsp&nbsp&nbsp<?php echo $_SESSION["firstname"];?>&nbsp&nbsp&nbsp&nbsp</h3>
      <h3 id="timer" style="text-align: center;"></h3>
    </div>
</div>
<br><br><br><br><br><br>
<form id="form1" action="result.php" method="post">
  <?php while($row=mysqli_fetch_assoc($q)){ ?>
		<h2><?php echo $i.". ".$row['question']; ?></h2><br>
  	<input type="radio" name="<?php echo $row['ques_id']?>" value="A"><?php echo $row['opt_a'] ?><br>
		<input type="radio" name="<?php echo $row['ques_id']?>" value="B"><?php echo $row['opt_b'] ?><br>
		<input type="radio" name="<?php echo $row['ques_id']?>" value="C"><?php echo $row['opt_c'] ?><br>
		<input type="radio" name="<?php echo $row['ques_id']?>" value="D"><?php echo $row['opt_d'] ?><br>
		<hr>
		<?php $i=$i+1; }?>
    <p align="center"><input class="submitbtn" type="submit" value="Submit" ></p>
</form><br>
</body>
</html>
