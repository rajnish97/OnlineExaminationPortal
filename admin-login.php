<html>
<head>
<link rel="stylesheet" type="text/css"  href="login.css">
<script type="text/javascript" src="login.js"></script>
</head>
<body>
<div class="login-page">
<h1 align="center"><b>ADMIN LOGIN</b></h1>
  <div class="form">
    <?php
        session_start();
        if(isset($_SESSION["loginerror"]))
        {
          echo '<span style="color:red;">'.$_SESSION["loginerror"].'</span>';
        }
    ?>
    <form class="login-form" action="admin-login-helper.php" method="post">
      <input type="text" placeholder="username" name="username" required>
      <input type="password" placeholder="password" name="password" required>
	  <button>login</button>
    <?php
      if(isset($_SESSION["loginerror"]))
      {
        session_unset();
      }
    ?>
      <p class="message"><a href="student-login.php">Login as student &nbsp |</a><a href="index.php"> &nbsp Back to home page</a></p>
    </form>
  </div>
</div>
</body>
</html>