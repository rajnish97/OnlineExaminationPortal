<html>
<head>
<link rel="stylesheet" type="text/css"  href="login.css">
<script type="text/javascript" src="login.js"></script>
</head>
<div class="login-page">
<h1 align="center"><b>STUDENT REGISTER</b></h1>
  <div class="form">
    <form class="register-form" action="register-helper.php" method="post">
      <input type="text" placeholder="First Name" name="first" required>
	    <input type="text" placeholder="Last Name" name="last" required>
      <input type="password" placeholder="Password" name="pass" required>
	    <input type="text" placeholder="User ID" name="uid" required>
      <input type="number" placeholder="Phone Number" name="phno" required>
	    <input type="text" placeholder="Email ID" name="email" required>
	    <input type="text" placeholder="SEMESTER" name="sem" required>
      <button>Create</button>
      <p class="message">Already registered? <a href="student-login.php">Sign In</a></p>
    </form>
  </div>
</div>
</html>